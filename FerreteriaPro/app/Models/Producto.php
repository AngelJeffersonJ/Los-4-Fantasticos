<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria; // Importar el modelo de Categoria
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
            'precio_unitario' => 'required|numeric',
            'stock' => 'required|integer',
            'id_categoria' => 'required', // Agregar validación para id_categoria
            'id_proveedor' => 'required', // Agregar validación para id_proveedor
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    // Resto de los métodos del controlador...
}
