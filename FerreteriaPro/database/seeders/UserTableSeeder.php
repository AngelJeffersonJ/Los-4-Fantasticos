<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Cambia 'password' por el hash adecuado si es necesario
                'role_id' => 5,
                'remember_token' => 'FmDG8Zp7HVjJKLjH3tJ0lnE4OZFULDnipgMHDDJHrVoaDMNWXTCbwhTrNy1F',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cliente User',
                'email' => 'cliente@example.com',
                'password' => Hash::make('password'), // Cambia 'password' por el hash adecuado si es necesario
                'role_id' => 6,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
