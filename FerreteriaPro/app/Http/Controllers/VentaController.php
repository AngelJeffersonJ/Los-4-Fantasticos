<?php

namespace App\Http\Controllers;

use App\Venta;
use App\VentaDetalle;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas', compact('ventas'));
    }

    public function create()
    {
        return view('ventas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'productos' => 'required|array',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        $venta = Venta::create(['cliente_id' => $request->cliente_id]);

        foreach ($request->productos as $producto) {
            VentaDetalle::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto['producto_id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
            ]);
        }

        return redirect()->route('ventas')->with('success', 'Venta creada exitosamente.');
    }

    public function show(Venta $venta)
    {
        return view('ventas', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        return view('ventas', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'productos' => 'required|array',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        $venta->update(['cliente_id' => $request->cliente_id]);

        $venta->detalles()->delete();

        foreach ($request->productos as $producto) {
            VentaDetalle::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto['producto_id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
            ]);
        }

        return redirect()->route('ventas')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas')->with('success', 'Venta eliminada exitosamente.');
    }
}