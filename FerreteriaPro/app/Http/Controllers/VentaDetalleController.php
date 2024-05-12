<?php

namespace App\Http\Controllers;

use App\VentaDetalle;
use Illuminate\Http\Request;

class VentaDetalleController extends Controller
{
    public function index()
    {
        $detalles = VentaDetalle::all();
        return view('venta_detalles.index', compact('detalles'));
    }

    public function create()
    {
        return view('venta_detalles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        VentaDetalle::create($request->all());
        return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta creado exitosamente.');
    }

    public function show(VentaDetalle $detalle)
    {
        return view('venta_detalles.show', compact('detalle'));
    }

    public function edit(VentaDetalle $detalle)
    {
        return view('venta_detalles.edit', compact('detalle'));
    }

    public function update(Request $request, VentaDetalle $detalle)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $detalle->update($request->all());
        return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta actualizado exitosamente.');
    }

    public function destroy(VentaDetalle $detalle)
    {
        $detalle->delete();
        return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta eliminado exitosamente.');
    }
}