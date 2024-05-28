<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        DB::table('clientes')->insert([
            [
                'id' => 2,
                'nombre' => 'Maynez',
                'direccion' => 'Villas',
                'telefono' => '4494567898',
                'created_at' => Carbon::parse('2024-05-16 05:07:36'),
                'updated_at' => Carbon::parse('2024-05-16 05:07:36')
            ],
            [
                'id' => 3,
                'nombre' => 'Cli1',
                'direccion' => 'Villas',
                'telefono' => '2',
                'created_at' => Carbon::parse('2024-05-27 22:49:35'),
                'updated_at' => Carbon::parse('2024-05-27 22:49:35')
            ],
        ]);
    }
}