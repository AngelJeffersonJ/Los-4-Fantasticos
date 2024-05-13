<?php

use Illuminate\Support\Facades\Route;

// Rutas para el controlador ProductoController
Route::resource('productos', 'ProductoController');

// Rutas para el controlador CategoriaController
Route::resource('categorias', 'CategoriaController');

// Rutas para el controlador ProveedorController
Route::resource('proveedores', 'ProveedorController');

// Rutas para el controlador ClienteController
Route::resource('clientes', 'ClienteController');

// Rutas para el controlador VentaController
Route::resource('ventas', 'VentaController');

// Rutas para el controlador VentaDetalleController
Route::resource('venta_detalles', 'VentaDetalleController');

// Rutas para el controlador InventarioController
Route::resource('inventario', 'InventarioController');
