<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos')->with('productos', $productos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio_unitario' => 'required|numeric',
            'stock' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'id_proveedor' => 'required|exists:proveedores,id',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos')->with('producto', $producto);
    }

    public function edit(Producto $producto)
    {
        return view('productos')->with('producto', $producto);
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio_unitario' => 'required|numeric',
            'stock' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'id_proveedor' => 'required|exists:proveedores,id',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos')->with('success', 'Producto eliminado exitosamente.');
    }
}
