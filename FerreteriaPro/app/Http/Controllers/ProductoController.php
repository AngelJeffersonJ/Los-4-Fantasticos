<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function __construct()
    {
        // Middleware para restringir el acceso solo a administradores
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->email === 'admin@example.com') {
                return $next($request);
            }
            return redirect()->route('errors.access_denied');
        });
    }

    /**
     * Muestra la lista de productos con sus relaciones.
     */
    public function index()
    {
        $productos = Producto::with('categoria', 'proveedor')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.create', compact('categorias', 'proveedores'));
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio_unitario' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'id_proveedor' => 'required|exists:proveedores,id',
        ]);

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra un producto en detalle.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto', 'categorias', 'proveedores'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio_unitario' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'id_proveedor' => 'required|exists:proveedores,id',
        ]);

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    /**
     * Sugiere un proveedor basado en precio y tiempo de entrega.
     */
    public function sugerirProveedor($id)
    {
        $producto = Producto::findOrFail($id);

        // Buscar el proveedor con mejor precio y menor tiempo de entrega
        $proveedorSugerido = Proveedor::orderBy('precio', 'asc')
            ->orderBy('tiempo_entrega', 'asc')
            ->first();

        // Verificar si hay proveedores disponibles
        if (!$proveedorSugerido) {
            return response()->json([
                'error' => 'No hay proveedores disponibles para este producto.'
            ], 404);
        }

        return response()->json([
            'producto' => $producto->nombre,
            'proveedor_sugerido' => $proveedorSugerido->nombre,
            'precio' => number_format($proveedorSugerido->precio, 2),
            'tiempo_entrega' => $proveedorSugerido->tiempo_entrega . ' días'
        ]);
    }
}
