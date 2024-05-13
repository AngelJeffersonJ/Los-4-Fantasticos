<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaDetalleController;
use App\Http\Controllers\InventarioController;

// Rutas para el controlador de Producto
Route::resource('productos', ProductoController::class);

// Rutas para el controlador de Categoría
Route::resource('categorias', CategoriaController::class);

// Rutas para el controlador de Proveedor
Route::resource('proveedores', ProveedorController::class);

// Rutas para el controlador de Cliente
Route::resource('clientes', ClienteController::class);

// Rutas para el controlador de Venta
Route::resource('ventas', VentaController::class);

// Rutas para el controlador de Detalle de Venta
Route::resource('venta_detalles', VentaDetalleController::class);

// Rutas para el controlador de Inventario
Route::resource('inventario', InventarioController::class);
