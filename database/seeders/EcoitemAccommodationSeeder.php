<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Ecoitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcoitemAccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $eco;
    public function __construct(Ecoitem $ecoitem)
    {
        $this->eco = $ecoitem;
    }
    public function run(): void
    {
        $accommodations = Accommodation::all();
        $eco_items = $this->eco->all();

        $eco_ids = [];

        foreach($eco_items as $eco){
            $eco_ids[] = $eco->id;
        }



        foreach ($accommodations as $accommodation) {

            $randomEcoitems = array_rand(array_flip($eco_ids), rand(1, count($eco_ids)));

            $accommodation->ecoitems()->sync($randomEcoitems);
        }
    }
}
