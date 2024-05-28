<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetSeeder extends Seeder
{
    public function run()
    {
        DB::table('password_reset_tokens')->truncate();

        DB::table('password_reset_tokens')->insert([
            // Agrega tus datos de ejemplo aquí, si es necesario
        ]);
    }
}
