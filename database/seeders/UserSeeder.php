<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'password' =>hash::make('password'),
                'nationality_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 1,
            ],
            [
                'name' => 'User2',
                'email' => 'user2@example.com',
                'password' =>hash::make('password'),
                'nationality_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 0,
            ],
            [
                'name' => 'User3',
                'email' => 'user3@example.com',
                'password' => hash::make('password'),
                'nationality_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 2,
            ],
            [
                'name' => 'User4',
                'email' => 'user4@example.com',
                'password' => hash::make('password'),
                'nationality_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'role' => 1,
            ],
        ]);
    }
}
