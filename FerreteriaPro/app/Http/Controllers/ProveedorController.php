<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $proveedores = Proveedor::all();
            return view('proveedores.index', compact('proveedores'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('proveedores.create');
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required'
            ]);

            Proveedor::create($request->all());

            return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(Proveedor $proveedor)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('proveedores.show', compact('proveedor'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(Proveedor $proveedor)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('proveedores.edit', compact('proveedor'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required'
            ]);

            $proveedor->update($request->all());

            return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(Proveedor $proveedor)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $proveedor->delete();
            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
