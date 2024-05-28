<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobBatchSeeder extends Seeder
{
    public function run()
    {
        DB::table('job_batches')->truncate();

        DB::table('job_batches')->insert([
            // Agrega tus datos de ejemplo aquí, si es necesario
        ]);
    }
}
