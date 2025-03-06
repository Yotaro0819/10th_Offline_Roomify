<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcoitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ecoitems = [
            ['ecoitem_name' => 'No amenities', 'point' => 5],
            ['ecoitem_name' => 'Dishes available', 'point' => 5],
            ['ecoitem_name' => 'Strict weste separation', 'point' => 5],
            ['ecoitem_name' => 'Bicycle rental', 'point' => 10],
            ['ecoitem_name' => 'Local Ingredients provided', 'point' => 10],
            ['ecoitem_name' => 'Carbon offset', 'point' => 10],
            ['ecoitem_name' => 'Solar panels', 'point' => 15],
            ['ecoitem_name' => 'LED lighting', 'point' => 15],
            ['ecoitem_name' => 'Water-saving', 'point' => 15],
            ['ecoitem_name' => 'Activities', 'point' => 15]
        ];

        DB::table('ecoitems')->insert($ecoitems);
    }
}
