<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Producto;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('inventarios.index', compact('inventarios'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('inventarios.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad_disponible' => 'required|integer|min:0',
            'cantidad_minima' => 'required|integer|min:0',
            'cantidad_maxima' => 'required|integer|min:0',
        ]);

        Inventario::create($request->all());
        return redirect()->route('inventarios.index')->with('success', 'Inventario creado exitosamente.');
    }

    public function show(Inventario $inventario)
    {
        return view('inventarios.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        $productos = Producto::all();
        return view('inventarios.edit', compact('inventario', 'productos'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad_disponible' => 'required|integer|min:0',
            'cantidad_minima' => 'required|integer|min:0',
            'cantidad_maxima' => 'required|integer|min:0',
        ]);

        $inventario->update($request->all());
        return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente.');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado exitosamente.');
    }
}