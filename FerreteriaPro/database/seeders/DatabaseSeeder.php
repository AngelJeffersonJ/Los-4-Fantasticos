<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            ClienteSeeder::class,
            VentaSeeder::class,
            VentaDetalleSeeder::class,
            InventarioSeeder::class,
            CacheSeeder::class,
            CacheLockSeeder::class,
            FailedJobSeeder::class,
            JobBatchSeeder::class,
            JobSeeder::class,
            MigrationSeeder::class,
            PasswordResetSeeder::class,
            SessionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
