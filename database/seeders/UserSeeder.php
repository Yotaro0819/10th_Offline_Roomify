<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'User1',
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
                'nationality_id' => 1,
                'role' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'User2',
                'email' => 'user2@example.com',
                'password' => bcrypt('password'),
                'nationality_id' => 2,
                'role' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'User3',
                'email' => 'user3@example.com',
                'password' => bcrypt('password'),
                'nationality_id' => 3,
                'role' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'User4',
                'email' => 'user4@example.com',
                'password' => bcrypt('password'),
                'nationality_id' => 4,
                'role' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
