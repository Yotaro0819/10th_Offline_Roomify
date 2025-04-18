<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    private $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function index($id)
    {
        $all_coupones = $this->coupon->where("user_id", $id)->get();

        return view('coupon')
                    ->with('all_coupones', $all_coupones);
    }

    public function getUserCoupons($id)
    {
        $coupons = $this->coupon->where("user_id", $id)->get();
        return response()->json($coupons);
    }

}
