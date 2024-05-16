<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaDetalleController;
use App\Http\Controllers\InventarioController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

// Rutas para el controlador de Proveedor
Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{proveedor}', [ProveedorController::class, 'show'])->name('proveedores.show');
Route::get('/proveedores/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

// Rutas para el controlador de Cliente
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// Rutas para el controlador de Venta
Route::resource('ventas', VentaController::class);

// Rutas para el controlador de Detalle de Venta
Route::get('venta_detalles', [VentaDetalleController::class, 'index'])->name('venta_detalles.index');
Route::get('venta_detalles/create', [VentaDetalleController::class, 'create'])->name('venta_detalles.create');
Route::post('venta_detalles', [VentaDetalleController::class, 'store'])->name('venta_detalles.store');
Route::get('venta_detalles/{venta_detalle}', [VentaDetalleController::class, 'show'])->name('venta_detalles.show');
Route::get('venta_detalles/{venta_detalle}/edit', [VentaDetalleController::class, 'edit'])->name('venta_detalles.edit');
Route::put('venta_detalles/{venta_detalle}', [VentaDetalleController::class, 'update'])->name('venta_detalles.update');
Route::delete('venta_detalles/{venta_detalle}', [VentaDetalleController::class, 'destroy'])->name('venta_detalles.destroy');

// Rutas para el controlador de Inventario
Route::get('/inventarios', [InventarioController::class, 'index'])->name('inventarios.index');
Route::get('/inventarios/create', [InventarioController::class, 'create'])->name('inventarios.create');
Route::post('/inventarios', [InventarioController::class, 'store'])->name('inventarios.store');
Route::get('/inventarios/{inventario}', [InventarioController::class, 'show'])->name('inventarios.show');
Route::get('/inventarios/{inventario}/edit', [InventarioController::class, 'edit'])->name('inventarios.edit');
Route::put('/inventarios/{inventario}', [InventarioController::class, 'update'])->name('inventarios.update');
Route::delete('/inventarios/{inventario}', [InventarioController::class, 'destroy'])->name('inventarios.destroy');
