<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FailedJobSeeder extends Seeder
{
    public function run()
    {
        DB::table('failed_jobs')->truncate();

        DB::table('failed_jobs')->insert([
            // Agrega tus datos de ejemplo aquí, si es necesario
        ]);
    }
}
