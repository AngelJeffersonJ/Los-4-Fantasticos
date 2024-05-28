<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventarios')->insert([
            [
                'id' => 2,
                'id_producto' => 2,
                'cantidad_disponible' => 7,
                'cantidad_minima' => 6,
                'cantidad_maxima' => 5,
                'created_at' => Carbon::parse('2024-05-16 05:30:56'),
                'updated_at' => Carbon::parse('2024-05-16 05:30:56')
            ],
        ]);
    }
}