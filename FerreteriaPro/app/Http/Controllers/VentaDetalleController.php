<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaDetalle;
use App\Models\Venta;
use App\Models\Producto;

class VentaDetalleController extends Controller
{
    public function index()
    {
        $ventaDetalles = VentaDetalle::all();
        return view('venta_detalles.index', compact('ventaDetalles'));
    }

    public function create()
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('venta_detalles.create', compact('ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_venta' => 'required|exists:ventas,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        VentaDetalle::create($request->all());
        return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta creado exitosamente.');
    }

    public function show(VentaDetalle $ventaDetalle)
    {
        return view('venta_detalles.show', compact('ventaDetalle'));
    }

    public function edit(VentaDetalle $ventaDetalle)
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('venta_detalles.edit', compact('ventaDetalle', 'ventas', 'productos'));
    }

    public function update(Request $request, VentaDetalle $ventaDetalle)
    {
        $request->validate([
            'id_venta' => 'required|exists:ventas,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $ventaDetalle->update($request->all());
        return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta actualizado exitosamente.');
    }

    public function destroy(VentaDetalle $ventaDetalle)
    {
        $ventaDetalle->delete();
        return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta eliminado exitosamente.');
    }
}