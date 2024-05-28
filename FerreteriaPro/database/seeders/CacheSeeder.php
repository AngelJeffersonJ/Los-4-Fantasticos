<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CacheSeeder extends Seeder
{
    public function run()
    {
        DB::table('cache')->truncate();

        DB::table('cache')->insert([
            // Agrega tus datos de ejemplo aquí, si es necesario
        ]);
    }
}
