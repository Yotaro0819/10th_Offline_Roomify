<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $accommodations = [
        [
            'name'          => 'Tokyo Tower',
            'user_id'       => 3,
            'address'       => 'Tokyo Tower, 4-chōme-2-8 Shibakōen, Minato City, Tokyo 105-0011, Japan',
            'price'         => 10000,
            'city'          => 'Minato City',
            'latitude'      => 35.65858050,
            'longitude'     => 139.74543290,
            'capacity'      => 5,
            'description'   => 'Perfect place to stay.',
            'rank'          => 'C',
            'created_at'    => now(),
            'updated_at'    => now(),
        ],
        [
            'name'          => 'Tokyo Sky Tree',
            'user_id'       => 3,
            'address'       => '1-chōme-1-2 Oshiage, Sumida City, Tokyo 131-0045, Japan',
            'price'         => 8000,
            'city'          => 'Sumida City',
            'latitude'      => 35.71025600,
            'longitude'     => 139.81079460,
            'capacity'      => 4,
            'description'   => 'Enjoy stay with very sceanic view',
            'rank'          => 'B',
            'created_at'    => now(),
            'updated_at'    => now(),
        ],
        [
            'name'          => 'Sinjuku Gyoen',
            'user_id'       => 3,
            'address'       => 'Japan, 〒160-0022 Tokyo, Shinjuku City, Shinjuku, 1-chōme−2−１ SHINJUKU GYOEN MAE MANSION',
            'price'         => 12000,
            'city'          => 'Shinjuku City',
            'latitude'      => 35.68767130,
            'longitude'     => 139.71250650,
            'capacity'      => 10,
            'description'   => 'Sinjuku Gyoen is a authentic place in Japan. This appotunity is limited to you.',
            'rank'          => 'C',

            'created_at'    => now(),
            'updated_at'    => now(),
        ],
        [
            'name'          => 'Yoyogi Park',
            'user_id'       => 3,
            'address'       => '2-1 Yoyogikamizonochō, Shibuya, Tokyo 151-0052, Japan',
            'price'         => 12000,
            'city'          => 'Shibuya',
            'latitude'      => 35.67003710,
            'longitude'     => 139.69314980,
            'capacity'      => 5,
            'description'   => "It's a tranquil place surrounded by abundant greenery.",
            'rank'          => 'A',
            'created_at'    => now(),
            'updated_at'    => now(),
        ],
        [
            'name'          => 'Meiji Jingu',
            'user_id'       => 3,
            'address'       => '1-1 Yoyogikamizonochō, Shibuya, Tokyo 151-0052, Japan',
            'price'         => 20000,
            'city'          => 'Shibuya',
            'latitude'      => 35.67407380,
            'longitude'     => 139.70299980,
            'capacity'      => 3,
            'description'   => 'It is a traditional Japanese building with a rich history. Staying here will become a treasured experience in your life.',
            'rank'          => 'B',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]
    ];

    DB::table('accommodations')->insert($accommodations);
    }
}
