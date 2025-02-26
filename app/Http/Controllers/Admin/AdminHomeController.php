<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Accommodation;

class AdminHomeController extends Controller
{
    public function getRanking()
    {
        $rankings = Booking::selectRaw('accommodation_id, COUNT(*) as reservation_count')
            ->groupBy('accommodation_id')
            ->orderByDesc('reservation_count')
            ->limit(3)
            ->get();


        foreach ($rankings as $ranking) {
            $accommodation = Accommodation::find($ranking->accommodation_id);
            $ranking->name = $accommodation ? $accommodation->name : "不明";
        }

        return response()->json($rankings);
    }

    public function getMonthlyBookings()
    {
        $monthlyBookings = Booking::selectRaw('DATE_FORMAT(check_in_date, "%Y-%m") as month, COUNT(*) as reservation_count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json($monthlyBookings);
    }
}
