<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Accommodation;

class CategoryAccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accommodations = Accommodation::all();

        $categories = Category::pluck('id')->toArray();

        foreach ($accommodations as $accommodation) {

            $randomCategories = array_rand(array_flip($categories), rand(1, count($categories)));

            $accommodation->categories()->sync($randomCategories);
        }
    }
}
