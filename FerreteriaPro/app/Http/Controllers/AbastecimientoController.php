<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrdenCompraMail;
use Illuminate\Support\Facades\Log;

class AbastecimientoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['inventario', 'proveedoresDisponibles.proveedor'])
            ->whereHas('inventario', function($q) {
                $q->whereColumn('cantidad_disponible', '<', 'cantidad_minima');
            })
            ->get()
            ->map(function($producto) {
                $producto->mejor_proveedor = $producto->proveedoresDisponibles
                    ->sortBy(fn($p) => [$p->precio, $p->tiempo_entrega])
                    ->first();
                return $producto;
            });

        return view('abastecimiento.index', compact('productos'));
    }

    public function realizarCompra(Request $request)
    {
        $data = $request->validate([
            'productos' => 'required|array',
            'cantidades' => 'required|array',
        ]);

        $correosEnviados = [];
        $sinCorreo = [];

        try {
            foreach ($data['productos'] as $productoId) {
                $producto = Producto::with('proveedoresDisponibles.proveedor')->findOrFail($productoId);
                $cantidad = $data['cantidades'][$productoId];

                $mejorProveedor = $producto->proveedoresDisponibles
                    ->sortBy(fn($p) => [$p->precio, $p->tiempo_entrega])
                    ->first();

                if (!$mejorProveedor || !$mejorProveedor->proveedor || empty($mejorProveedor->proveedor->email)) {
                    $sinCorreo[] = $producto->nombre;
                    continue;
                }

                // Actualiza inventario
                $inventario = Inventario::where('id_producto', $productoId)->first();
                if ($inventario) {
                    $inventario->cantidad_disponible += $cantidad;
                    $inventario->save();
                }

                // Envío correo real
                Mail::to($mejorProveedor->proveedor->email)->send(new OrdenCompraMail($producto, $cantidad, $mejorProveedor->proveedor));

                $correosEnviados[] = "{$mejorProveedor->proveedor->nombre} <{$mejorProveedor->proveedor->email}>";
            }

            $mensaje = 'Órdenes enviadas correctamente.';
            if (!empty($sinCorreo)) {
                $mensaje .= ' Productos sin proveedor o correo: ' . implode(', ', $sinCorreo);
            }

            return redirect()->route('abastecimiento.index')
                ->with('success', $mensaje)
                ->with('correos_enviados', $correosEnviados);

        } catch (\Exception $e) {
            Log::error('Error realizando compra: ' . $e->getMessage());
            return redirect()->route('abastecimiento.index')->with('error', 'Error al realizar compra.');
        }
    }
}
