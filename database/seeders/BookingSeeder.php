<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder{

    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 1,
                'accommodation_id' => 1,
                'check_in_date' => Carbon::now()->addDays(1)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(3)->toDateString(),
                'status' => 1, // 1 for 'confirmed'
                'num_guest' => 2, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'accommodation_id' => 1,
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
