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
                'guest_id' => 1,
                'host_id' => 3,
                'accommodation_id' => 1,
                'check_in_date' => Carbon::create(2025, 1, 5)->toDateString(),
                'check_out_date' => Carbon::create(2025, 1, 7)->toDateString(),
                'status' => 1, // 1 for 'confirmed'
                'num_guest' => 2,
                'host_name' => 'host',
                'guest_name' => 'guest1',
                'guest_email' => 'guest1@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 3,
                'host_id' => 3,
                'accommodation_id' => 1,
                'check_in_date' => Carbon::create(2025, 1, 15)->toDateString(),
                'check_out_date' => Carbon::create(2025, 1, 24)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 1,
                'check_in_date' => Carbon::create(2025, 2, 15)->toDateString(),
                'check_out_date' => Carbon::create(2025, 2, 26)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 2,
                'check_in_date' => Carbon::create(2025, 3, 2)->toDateString(),
                'check_out_date' => Carbon::create(2025, 3, 6)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 2,
                'check_in_date' => Carbon::create(2025, 3, 2)->toDateString(),
                'check_out_date' => Carbon::create(2025, 3, 8)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 2,
                'check_in_date' => Carbon::create(2025, 3, 6)->toDateString(),
                'check_out_date' => Carbon::create(2025, 3, 24)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 3,
                'host_id' => 3,
                'accommodation_id' => 3,
                'check_in_date' => Carbon::create(2025, 6, 29)->toDateString(),
                'check_out_date' => Carbon::create(2025, 6, 30)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 3,
                'check_in_date' => Carbon::create(2025, 4, 2)->toDateString(),
                'check_out_date' => Carbon::create(2025, 4, 6)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 3,
                'check_in_date' => Carbon::create(2025, 5, 12)->toDateString(),
                'check_out_date' => Carbon::create(2025, 5, 14)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 3,
                'check_in_date' => Carbon::create(2025, 5, 7)->toDateString(),
                'check_out_date' => Carbon::create(2025, 5, 9)->toDateString(),
                'status' => 2, // 2 for 'pending'
                'num_guest' => 3,
                'host_name' => 'host',
                'guest_name' => 'guest2',
                'guest_email' => 'guest2@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
