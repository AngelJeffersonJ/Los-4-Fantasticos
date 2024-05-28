<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentaDetalleSeeder extends Seeder
{
    public function run()
    {
        DB::table('venta_detalles')->insert([
            [
                'id' => 1,
                'id_venta' => 15,
                'id_producto' => 2,
                'cantidad' => 23,
                'precio_unitario' => 33323.00,
                'created_at' => Carbon::parse('2024-05-16 06:16:50'),
                'updated_at' => Carbon::parse('2024-05-16 06:17:06')
            ],
        ]);
    }
}
