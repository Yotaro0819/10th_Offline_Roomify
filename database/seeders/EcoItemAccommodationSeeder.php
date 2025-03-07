<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\EcoItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcoitemAccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accommodations = Accommodation::all();

        $ecoitems = EcoItem::pluck('id')->toArray();

        foreach ($accommodations as $accommodation) {

            $randomEcoitems = array_rand(array_flip($ecoitems), rand(1, count($ecoitems)));

            $accommodation->ecoitems()->sync($randomEcoitems);
        }
    }
}
