<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos', compact('productos', 'categorias', 'proveedores'));
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
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
