<?php

namespace App\Http\Controllers;

use App\Models\CompraCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CatalogoController extends Controller
{
    public function index()
    {
        $productos = DB::table('productos')
            ->leftJoin('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->leftJoin('proveedores', 'productos.id_proveedor', '=', 'proveedores.id')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio_unitario',
                'productos.stock',
                'categorias.nombre as categoria_nombre',
                'proveedores.nombre as proveedor_nombre'
            )
            ->get()
            ->map(function($producto) {
                return (object) $producto;
            });

        $categories = DB::table('categorias')->get();

        return view('catalogo.index', compact('productos', 'categories'));
    }

    public function show($id)
    {
        $producto = DB::table('productos')
            ->leftJoin('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->leftJoin('proveedores', 'productos.id_proveedor', '=', 'proveedores.id')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio_unitario',
                'productos.stock',
                'categorias.nombre as categoria_nombre',
                'proveedores.nombre as proveedor_nombre'
            )
            ->where('productos.id', $id)
            ->first();

        $producto = (object) $producto;

        return view('catalogo.show', compact('producto'));
    }

    public function agregarAlCarrito(Request $request, $id)
    {
        $producto = DB::table('productos')
            ->leftJoin('categorias', 'productos.id_categoria', '=', 'categorias.id')
            ->leftJoin('proveedores', 'productos.id_proveedor', '=', 'proveedores.id')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio_unitario',
                'productos.stock',
                'categorias.nombre as categoria_nombre',
                'proveedores.nombre as proveedor_nombre'
            )
            ->where('productos.id', $id)
            ->first();

        $producto = (object) $producto;

        $carrito = Session::get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio_unitario,
                'cantidad' => 1,
            ];
        }

        Session::put('carrito', $carrito);
        return redirect()->route('catalogo.index')->with('success', 'Producto agregado al carrito!');
    }

    public function carrito()
    {
        $carrito = Session::get('carrito', []);
        return view('catalogo.carrito', compact('carrito'));
    }

    public function comprar()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar una compra.');
        }

        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('catalogo.carrito')->with('error', 'Tu carrito está vacío.');
        }

        foreach ($carrito as $id => $detalle) {
            $producto = DB::table('productos')
                ->select('productos.*')
                ->where('productos.id', $id)
                ->first();

            $producto = (object) $producto;

            if ($producto->stock >= $detalle['cantidad']) {
                // Restar del stock
                DB::table('productos')
                    ->where('id', $id)
                    ->decrement('stock', $detalle['cantidad']);

                // Registrar la compra individualmente
                DB::table('compras_cliente')->insert([
                    'user_id' => Auth::id(),
                    'producto_id' => $id,
                    'cantidad' => $detalle['cantidad'],
                    'total' => $detalle['precio'] * $detalle['cantidad'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                return redirect()->route('catalogo.carrito')->with('error', 'Stock insuficiente para ' . $detalle['nombre']);
            }
        }

        Session::forget('carrito');
        return redirect()->route('catalogo.index')->with('success', '¡Compra realizada con éxito!');
    }
}
