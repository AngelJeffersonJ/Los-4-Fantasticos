<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios y asignar roles
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $cliente = User::create([
            'name' => 'Cliente User',
            'email' => 'cliente@example.com',
            'password' => bcrypt('password'),
        ]);
        $cliente->assignRole('cliente');
    }
}