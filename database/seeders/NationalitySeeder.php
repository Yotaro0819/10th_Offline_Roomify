<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {




        $nationalities = [
        [
            'nationality' => '🇯🇵Japan'
        ],
        [
            'nationality' => '🇰🇷Korea'
        ],
        [
            'nationality' => '🇦🇺Australia'
        ],
        [
            'nationality' => '🇪🇸Spain'
        ]
    ];

    DB::table('nationalities')->insert($nationalities);
    }
}
