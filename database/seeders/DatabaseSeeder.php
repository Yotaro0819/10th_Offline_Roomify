<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            NationalitySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            EcoItemSeeder::class,
            AccommodationSeeder::class,
            BookingSeeder::class,
            CategoryAccommodationSeeder::class,
            EcoItemAccommodationSeeder::class,
            CouponSeeder::class,
            ContactSeeder::class,
            PhotoSeeder::class,
        ]);

    }
}
