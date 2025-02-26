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
                'check_in_date' => Carbon::now()->addDays(1)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(3)->toDateString(),
                'status' => 1, // 1 for 'confirmed'
                'num_guest' => 2,
                'host_name' => 'host',
                'guest_name' => 'guest1',
                'guest_email' => 'guest1@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'guest_id' => 4,
                'host_id' => 3,
                'accommodation_id' => 1,
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
                'check_in_date' => Carbon::now()->addDays(4)->toDateString(),
                'check_out_date' => Carbon::now()->addDays(6)->toDateString(),
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
