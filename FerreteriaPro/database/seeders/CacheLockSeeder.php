<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CacheLockSeeder extends Seeder
{
    public function run()
    {
        DB::table('cache_locks')->truncate();

        DB::table('cache_locks')->insert([
            // Agrega tus datos de ejemplo aquí, si es necesario
        ]);
    }
}
