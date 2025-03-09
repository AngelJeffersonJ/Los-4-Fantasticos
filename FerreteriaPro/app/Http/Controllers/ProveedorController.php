<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Support\Facades\Mail;
use App\Mail\SugerenciaProveedorMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function __construct()
    {
        // Middleware para restringir acceso solo a administradores
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || Auth::user()->email !== 'admin@example.com') {
                return redirect()->route('errors.access_denied');
            }
            return $next($request);
        });
    }

    /**
     * 📌 Muestra la lista de proveedores con búsqueda avanzada.
     */
    public function index(Request $request)
    {
        $query = Proveedor::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            // 🔍 Buscar en todas las columnas relevantes
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('direccion', 'like', "%$search%")
                  ->orWhere('telefono', 'like', "%$search%")
                  ->orWhere('precio', 'like', "%$search%")
                  ->orWhere('tiempo_entrega', 'like', "%$search%");
            });
        }

        $proveedores = $query->get();

        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * 📌 Muestra el formulario para crear un nuevo proveedor.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * 📌 Almacena un nuevo proveedor en la base de datos.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20|regex:/^[0-9\-\(\)\s]+$/',
            'precio' => 'required|numeric|min:0',
            'tiempo_entrega' => 'required|integer|min:1',
        ]);

        Proveedor::create($data);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * 📌 Muestra los detalles de un proveedor y su historial de precios.
     */
    public function show(Proveedor $proveedor)
    {
        $historial = DB::table('historial_precios')
            ->where('id_proveedor', $proveedor->id)
            ->orderBy('fecha_cambio', 'desc')
            ->get();

        return view('proveedores.show', compact('proveedor', 'historial'));
    }

    /**
     * 📌 Muestra el formulario para editar un proveedor.
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * 📌 Actualiza un proveedor en la base de datos y guarda historial de cambios.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20|regex:/^[0-9\-\(\)\s]+$/',
            'precio' => 'required|numeric|min:0'
        ]);

        // Guardar historial del precio si cambia
        if ($proveedor->precio != $data['precio']) {
            DB::table('historial_precios')->insert([
                'id_proveedor' => $proveedor->id,
                'precio_anterior' => $proveedor->precio,
                'precio_nuevo' => $data['precio'],
                'fecha_cambio' => now()
            ]);
        }

        $proveedor->update($data);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * 📌 Elimina un proveedor si no tiene dependencias.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        // Verificar si el proveedor tiene productos asociados
        if (Producto::where('id_proveedor', $proveedor->id)->exists()) {
            return redirect()->route('proveedores.index')->with('error', 'No se puede eliminar el proveedor porque tiene productos asociados.');
        }

        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }

    /**
     * 📌 Genera sugerencias de proveedores y las envía por correo electrónico.
     */
    public function sugerirProveedor(Request $request)
    {
        // Validar que el usuario ingrese un correo válido
        $request->validate([
            'correo' => 'required|email'
        ]);
    
        // Obtener el correo desde el formulario
        $correoDestino = $request->correo;
    
        // Obtener los mejores proveedores por precio y tiempo de entrega
        $mejoresProveedores = Proveedor::orderBy('precio', 'asc')
            ->orderBy('tiempo_entrega', 'asc')
            ->limit(5)
            ->get();
    
        if ($mejoresProveedores->isEmpty()) {
            return redirect()->back()->with('error', 'No hay proveedores disponibles para sugerencias.');
        }
    
        // Enviar el correo con una plantilla mejorada
        Mail::to($correoDestino)->send(new SugerenciaProveedorMail($mejoresProveedores));
    
        return redirect()->back()->with('success', '📩 Sugerencias enviadas correctamente a ' . $correoDestino);
    }
    
}
