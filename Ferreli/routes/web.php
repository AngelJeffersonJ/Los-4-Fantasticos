<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaDetalleController;
use App\Http\Controllers\InventarioController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Producto
Route::resource('productos', ProductoController::class);

// Rutas para Categoría
Route::resource('categorias', CategoriaController::class);

// Rutas para Proveedor
Route::resource('proveedores', ProveedorController::class);

// Rutas para Cliente
Route::resource('clientes', ClienteController::class);

// Rutas para Venta
Route::resource('ventas', VentaController::class);

// Rutas para Detalles de Venta
Route::resource('venta_detalles', VentaDetalleController::class);

// Rutas para Inventario
Route::resource('inventarios', InventarioController::class);

