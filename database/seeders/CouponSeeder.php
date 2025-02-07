<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{ 
    public function run(): void
    {
        
        $coupons = [
            [
                'code' => 111,
                'name'=> '5% discount',
                'discount_value'=> 5,
                'valid_from'=> Carbon::now(),
                'expires_at'=> Carbon::now()->addDays(90),
                'user_id' => 1
            ],

            [
                'code' => 222,
                'name'=> '10% discount',
                'discount_value'=> 10,
                'valid_from'=> Carbon::now(),
                'expires_at'=> Carbon::now()->addDays(90),
                'user_id' => 1
            ],

            [
                'code' => 333,
                'name'=> '15% discount',
                'discount_value'=> 15,
                'valid_from'=> Carbon::now(),
                'expires_at'=> Carbon::now()->addDays(90),
                'user_id' => 1
            ],
        ];

        Coupon::insert($coupons);
    }
}
