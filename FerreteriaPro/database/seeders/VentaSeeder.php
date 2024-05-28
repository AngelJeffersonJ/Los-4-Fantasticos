<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VentaSeeder extends Seeder
{
    public function run()
    {
        DB::table('ventas')->insert([
            [
                'id' => 15,
                'fecha' => '2024-05-10',
                'id_cliente' => 2,
                'created_at' => Carbon::parse('2024-05-16 00:16:15'),
                'updated_at' => Carbon::parse('2024-05-20 13:46:54')
            ],
            [
                'id' => 17,
                'fecha' => '2024-04-10',
                'id_cliente' => 2,
                'created_at' => Carbon::parse('2024-05-19 06:55:14'),
                'updated_at' => Carbon::parse('2024-05-19 06:55:14')
            ],
        ]);
    }
}
