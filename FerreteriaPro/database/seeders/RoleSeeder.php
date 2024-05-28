<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['id' => 5, 'name' => 'admin', 'created_at' => '2024-05-26 01:38:50', 'updated_at' => '2024-05-26 01:38:50'],
            ['id' => 6, 'name' => 'cliente', 'created_at' => '2024-05-26 01:38:50', 'updated_at' => '2024-05-26 01:38:50'],
        ]);
    }
}
