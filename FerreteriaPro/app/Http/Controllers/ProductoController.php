<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $productos = Producto::all();
            return view('productos.index', compact('productos'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $categorias = Categoria::all();
            $proveedores = Proveedor::all();
            return view('productos.create', compact('categorias', 'proveedores'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required',
                'descripcion' => 'nullable',
                'precio_unitario' => 'required|numeric',
                'stock' => 'required|integer',
                'id_categoria' => 'required|exists:categorias,id',
                'id_proveedor' => 'required|exists:proveedores,id',
            ]);

            Producto::create($request->all());

            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(Producto $producto)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('productos.show', compact('producto'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(Producto $producto)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $categorias = Categoria::all();
            $proveedores = Proveedor::all();
            return view('productos.edit', compact('producto', 'categorias', 'proveedores'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, Producto $producto)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required',
                'descripcion' => 'nullable',
                'precio_unitario' => 'required|numeric',
                'stock' => 'required|integer',
                'id_categoria' => 'required|exists:categorias,id',
                'id_proveedor' => 'required|exists:proveedores,id',
            ]);

            $producto->update($request->all());

            return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(Producto $producto)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
