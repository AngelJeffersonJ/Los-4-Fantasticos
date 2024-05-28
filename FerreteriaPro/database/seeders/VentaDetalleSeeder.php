<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaDetalleSeeder extends Seeder
{
    public function run()
    {
        DB::table('venta_detalles')->truncate();

        DB::table('venta_detalles')->insert([
            ['id' => 1, 'id_venta' => 15, 'id_producto' => 4, 'cantidad' => 23, 'precio_unitario' => 33323.00, 'created_at' => '2024-05-16 06:16:50', 'updated_at' => '2024-05-16 06:17:06'],
        ]);
    }
}
