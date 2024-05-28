<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $inventarios = Inventario::all();
            return view('inventarios.index', compact('inventarios'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $productos = Producto::all();
            return view('inventarios.create', compact('productos'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'id_producto' => 'required|exists:productos,id',
                'cantidad_disponible' => 'required|integer',
                'cantidad_minima' => 'required|integer',
                'cantidad_maxima' => 'required|integer'
            ]);

            Inventario::create($request->all());

            return redirect()->route('inventarios.index')->with('success', 'Inventario creado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(Inventario $inventario)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('inventarios.show', compact('inventario'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(Inventario $inventario)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $productos = Producto::all();
            return view('inventarios.edit', compact('inventario', 'productos'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, Inventario $inventario)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'id_producto' => 'required|exists:productos,id',
                'cantidad_disponible' => 'required|integer',
                'cantidad_minima' => 'required|integer',
                'cantidad_maxima' => 'required|integer'
            ]);

            $inventario->update($request->all());

            return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(Inventario $inventario)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $inventario->delete();
            return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
