<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationSeeder extends Seeder
{
    public function run()
    {
        DB::table('migrations')->truncate();

        DB::table('migrations')->insert([
            ['id' => 1, 'migration' => '0001_01_01_000000_create_users_table', 'batch' => 1],
            ['id' => 2, 'migration' => '0001_01_01_000001_create_cache_table', 'batch' => 1],
            ['id' => 3, 'migration' => '0001_01_01_000002_create_jobs_table', 'batch' => 1],
            ['id' => 4, 'migration' => '2024_04_03_164843_create__producto_table', 'batch' => 1],
            ['id' => 5, 'migration' => '2024_05_12_194552_create_productos_table', 'batch' => 2],
            ['id' => 6, 'migration' => '2024_05_12_201730_create_productos_table', 'batch' => 3],
            ['id' => 7, 'migration' => '2024_05_12_201756_create_categoria_table', 'batch' => 4],
            ['id' => 8, 'migration' => '2024_05_12_201834_create_proveedores_table', 'batch' => 5],
            ['id' => 9, 'migration' => '2024_05_12_201853_create_clientes_table', 'batch' => 6],
            ['id' => 10, 'migration' => '2024_05_12_201913_create_venta_table', 'batch' => 7],
            ['id' => 11, 'migration' => '2024_05_12_202020_create_venta_detalle_table', 'batch' => 8],
            ['id' => 12, 'migration' => '2024_05_12_202031_create_inventario_table', 'batch' => 9],
            ['id' => 13, 'migration' => '2024_05_12_203830_create_inventario_table', 'batch' => 10],
            ['id' => 14, 'migration' => '2024_05_12_204052_create_inventario_table', 'batch' => 11],
            ['id' => 15, 'migration' => '2024_05_12_205426_create_categoria_table', 'batch' => 12],
            ['id' => 16, 'migration' => '2024_05_12_205514_create_proveedores_table', 'batch' => 13],
            ['id' => 17, 'migration' => '2024_05_12_205601_create_clientes_table', 'batch' => 14],
            ['id' => 18, 'migration' => '2024_05_12_212549_create_productos_table', 'batch' => 15],
            ['id' => 19, 'migration' => '2024_05_12_223657_create_categorias_table', 'batch' => 16],
            ['id' => 20, 'migration' => '2024_05_12_223751_create_proveedores_table', 'batch' => 17],
            ['id' => 21, 'migration' => '2024_05_12_223821_create_clientes_table', 'batch' => 18],
            ['id' => 22, 'migration' => '2024_05_12_223846_create_ventas_table', 'batch' => 19],
            ['id' => 23, 'migration' => '2024_05_12_224931_create_productos_table', 'batch' => 20],
            ['id' => 24, 'migration' => '2024_05_25_232606_create_roles_table', 'batch' => 21],
            ['id' => 25, 'migration' => '2024_05_25_232927_add_role_id_to_users_table', 'batch' => 22],
        ]);
    }
}
