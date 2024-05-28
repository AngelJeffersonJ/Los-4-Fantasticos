<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Deshabilitamos las restricciones de claves foráneas
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            CategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            ClienteSeeder::class,
            VentaSeeder::class,
            VentaDetalleSeeder::class,
            InventarioSeeder::class,
            \Database\Seeders\OtroRoladoTableSeeder::class,
            UsersSeeder::class,
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
