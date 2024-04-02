<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $productos = Producto::all();
        
        // Retornar la vista de la lista de productos con los datos
        return view('index', ['productos' => $productos]);
    }

    public function create()
    {
        // Retornar la vista para crear un nuevo producto
        return view('create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            // Agrega aquí más reglas de validación según tus necesidades
        ]);

        // Crear un nuevo objeto Producto con los datos del formulario
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        // Guardar el nuevo producto en la base de datos
        $producto->save();

        // Redireccionar a la página de lista de productos
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        // Retornar la vista para editar un producto con los datos del producto seleccionado
        return view('edit', ['producto' => $producto]);
    }

    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            // Agrega aquí más reglas de validación según tus necesidades
        ]);

        // Actualizar los datos del producto con los datos del formulario
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        // Guardar los cambios en la base de datos
        $producto->save();

        // Redireccionar a la página de lista de productos
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        // Eliminar el producto de la base de datos
        $producto->delete();

        // Redireccionar a la página de lista de productos
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        // Retornar la vista para mostrar los detalles de un producto
        return view('productos.show', ['producto' => $producto]);
    }
}
