<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run()
    {
        DB::table('jobs')->truncate();

        DB::table('jobs')->insert([
            // Agrega tus datos de ejemplo aquí, si es necesario
        ]);
    }
}
