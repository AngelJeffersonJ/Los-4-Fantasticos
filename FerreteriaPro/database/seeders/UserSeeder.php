<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('password'), 
                'role_id' => 5, 
                'remember_token' => 'FmDG8Zp7HVjJKLjH3tJ0lnE4OZFULDnipgMHDDJHrVoaDMNWXTCbwhTrNy1F', 
                'created_at' => '2024-05-26 01:38:51', 
                'updated_at' => '2024-05-26 22:05:23'
            ],
            [
                'name' => 'Cliente User', 
                'email' => 'cliente@example.com', 
                'email_verified_at' => null, 
                'password' => Hash::make('password'), 
                'role_id' => 6, 
                'remember_token' => null, 
                'created_at' => '2024-05-26 01:38:51', 
                'updated_at' => '2024-05-26 01:38:51'
            ],
        ]);
    }
}
