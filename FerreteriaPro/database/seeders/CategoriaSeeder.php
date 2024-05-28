<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'id' => 1,
                'nombre' => 'Categoría 1',
                'created_at' => Carbon::parse('2024-05-15 14:04:16'),
                'updated_at' => Carbon::parse('2024-05-15 14:04:16')
            ],
            [
                'id' => 2,
                'nombre' => 'Categoría 2',
                'created_at' => Carbon::parse('2024-05-15 14:04:16'),
                'updated_at' => Carbon::parse('2024-05-15 14:04:16')
            ],
            [
                'id' => 5,
                'nombre' => 'Categoría 3',
                'created_at' => Carbon::parse('2024-05-26 23:34:37'),
                'updated_at' => Carbon::parse('2024-05-27 04:29:24')
            ],
            [
                'id' => 6,
                'nombre' => 'Categoría 4',
                'created_at' => Carbon::parse('2024-05-26 23:38:27'),
                'updated_at' => Carbon::parse('2024-05-26 23:38:27')
            ],
            [
                'id' => 7,
                'nombre' => 'Categoría 5',
                'created_at' => Carbon::parse('2024-05-27 04:16:07'),
                'updated_at' => Carbon::parse('2024-05-27 04:29:33')
            ],
            [
                'id' => 8,
                'nombre' => 'Categoría 6',
                'created_at' => Carbon::parse('2024-05-27 04:30:04'),
                'updated_at' => Carbon::parse('2024-05-27 04:30:04')
            ],
        ]);
    }
}
