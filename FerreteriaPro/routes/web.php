<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaDetalleController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbastecimientoController;
use App\Http\Controllers\FinanzasController;
use App\Http\Controllers\ServicioClienteController;
use App\Http\Controllers\GestionDocumentalController;
use App\Http\Controllers\PedidoController;
// ⚡ Depuración: Para verificar si Laravel está registrando rutas
// Si necesitas hacer una prueba, descomenta esta línea
// dd('Laravel está cargando las rutas correctamente');

//Ruta principal para mostrar el panel de historial de compras del cliente
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');


// Ruta principal para mostrar el panel de gestión documental
Route::get('/gestion-documental', [App\Http\Controllers\GestionDocumentalController::class, 'index'])->name('gestion_documental.index');

// Ruta principal para mostrar el panel de finanzas
Route::get('/finanzas', [FinanzasController::class, 'index'])->name('finanzas.index');

// Ruta principal para mostrar el panel de mercadotecnia
Route::get('/mercadotecnia', [App\Http\Controllers\MercadotecniaController::class, 'index'])->name('mercadotecnia.index');

// Ruta principal para mostrar el panel de servicio al cliente

Route::get('/servicio-cliente', [ServicioClienteController::class, 'index'])->name('servicio_cliente.index');


// Rutas de Productos
Route::get('/productos/sugerir-proveedor/{id}', [ProductoController::class, 'sugerirProveedor']);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// 📦 RUTAS PARA EL PANEL DE ABASTECIMIENTO
Route::prefix('abastecimiento')->group(function () {
    Route::get('/', [AbastecimientoController::class, 'index'])->name('abastecimiento.index');
    Route::post('/realizar-compra', [AbastecimientoController::class, 'realizarCompra'])->name('abastecimiento.realizarCompra');
    Route::get('/abastecimiento/historial', [AbastecimientoController::class, 'historial'])->name('abastecimiento.historial');
    Route::get('/abastecimiento/envio/{id}', [AbastecimientoController::class, 'envio'])->name('abastecimiento.envio');
});

// Rutas de Categorías
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Rutas de Proveedores
Route::resource('proveedores', ProveedorController::class)->parameters([
    'proveedores' => 'proveedor'
]);

// Ruta para sugerir proveedores
Route::post('/proveedores/sugerir', [ProveedorController::class, 'sugerirProveedor'])->name('proveedores.sugerir');

// Rutas de Clientes
Route::resource('/clientes', ClienteController::class);

// Rutas de Ventas
Route::resource('/ventas', VentaController::class);

// Rutas de Detalles de Venta
Route::resource('/venta_detalles', VentaDetalleController::class);

// Rutas de Inventarios
Route::resource('/inventarios', InventarioController::class);

// Rutas de Categorías
Route::resource('/categorias', CategoriaController::class);

// Rutas del catálogo
Route::get('/', [CatalogoController::class, 'index'])->name('catalogo.index');
Route::get('/producto/{id}', [CatalogoController::class, 'show'])->name('catalogo.show');
Route::post('/producto/{id}/agregar', [CatalogoController::class, 'agregarAlCarrito'])->name('catalogo.agregar');
Route::get('/carrito', [CatalogoController::class, 'carrito'])->name('catalogo.carrito');
Route::post('/comprar', [CatalogoController::class, 'comprar'])->name('catalogo.comprar');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UserController::class, 'perfil'])->name('user.perfil');
    Route::post('/perfil/actualizar', [UserController::class, 'actualizarPerfil'])->name('user.actualizarPerfil');
});

// Ruta de autenticación (solo si se usa Laravel UI)
if (class_exists('Auth')) {
    Auth::routes();
}

// Ruta principal después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Página de error de acceso denegado
Route::get('/access-denied', function () {
    return view('errors.access_denied');
})->name('errors.access_denied');