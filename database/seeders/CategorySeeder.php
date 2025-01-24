<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'WI-FI'],
            ['category_name' => 'Kitchen'],
            ['category_name' => 'Nice View'],
            ['category_name' => 'Parking'],
            ['category_name' => 'TV'],
            ['category_name' => 'Air Conditioner'],
            ['category_name' => 'Washer'],
            ['category_name' => 'Hair Dryer'],
            ['category_name' => 'Refrigerator'],
        ];

        DB::table('categories')->insert($categories);
    }
}
