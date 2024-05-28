<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['id' => 5, 'name' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'name' => 'cliente', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
