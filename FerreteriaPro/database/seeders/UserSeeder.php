<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'), // Password cifrada
                'role_id' => 5,
                'remember_token' => 'FmDG8Zp7HVjJKLjH3tJ0lnE4OZFULDnipgMHDDJHrVoaDMNWXTCbwhTrNy1F',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Cliente User',
                'email' => 'cliente@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'), // Password cifrada
                'role_id' => 6,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
