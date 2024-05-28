<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriaSeeder::class,
            ProductoSeeder::class,
            ClienteSeeder::class,
            ProveedorSeeder::class,
            InventarioSeeder::class,
            VentaSeeder::class,
            VentaDetalleSeeder::class,
        ]);
    }
}
