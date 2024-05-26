<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

require 'vendor/autoload.php';

// Configurar la aplicación
$app = require_once 'bootstrap/app.php';

// Obtener la instancia del framework
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Correr la aplicación
$kernel->bootstrap();

// Insertar roles
DB::table('roles')->insert([
    ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'cliente', 'created_at' => now(), 'updated_at' => now()],
]);

// Obtener IDs de los roles
$adminRoleId = DB::table('roles')->where('name', 'admin')->first()->id;
$clienteRoleId = DB::table('roles')->where('name', 'cliente')->first()->id;

// Insertar usuarios con contraseñas cifradas
DB::table('users')->insert([
    [
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role_id' => $adminRoleId,
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'name' => 'Cliente User',
        'email' => 'cliente@example.com',
        'password' => Hash::make('password'),
        'role_id' => $clienteRoleId,
        'created_at' => now(),
        'updated_at' => now()
    ],
]);

echo "Usuarios creados exitosamente.";