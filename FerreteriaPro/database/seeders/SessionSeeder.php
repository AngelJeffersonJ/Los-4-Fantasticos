<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    public function run()
    {
        DB::table('sessions')->truncate();

        DB::table('sessions')->insert([
            ['id' => 'fKeaiYNwIwrzARNeka2BNiXwBltYC8GKbduA5YLy', 'user_id' => 2, 'ip_address' => '127.0.0.1', 'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 OPR/110.0.0.0', 'payload' => 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamRhNlROemxMSzQ2UGp6enZDblVNYWx3RkNvZGpzR0NSZHk3NG1RbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3N0cml...', 'last_activity' => 1716871738],
        ]);
    }
}
