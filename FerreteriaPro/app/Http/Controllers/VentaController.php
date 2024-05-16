<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('ventas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        Venta::create($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        return view('ventas.edit', compact('venta', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        $venta->update($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }
}