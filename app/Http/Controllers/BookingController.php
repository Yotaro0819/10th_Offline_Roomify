<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    private $booking;

    public function __construct(Booking $booking){
        
        $this->booking = $booking;

    }

    public function reservation(Request $request){
       
        $all_bookings = $this->booking->where('user_id', Auth::user()->id)->latest()->paginate(3);

        return view('hostRes')->with('all_bookings', $all_bookings);
    }
}
