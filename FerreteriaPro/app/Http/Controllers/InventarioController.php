<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with('producto')->get();
        return view('inventarios.index', compact('inventarios'));
    }

    public function create()
    {
        return view('inventarios.create');
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
        return view('inventarios.edit', compact('inventario'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
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