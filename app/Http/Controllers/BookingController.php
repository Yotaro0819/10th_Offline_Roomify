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
       
        $all_bookings = $this->booking->with('accomodation')->where('user_id', Auth::user()->id)->latest()->paginate(3);

        $booking = null;

        return view('hostRes')->with('all_bookings', $all_bookings);
    
    }

    public function showBookingStatus($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        return view('hostRes', compact('booking'));
    }

    public function cancel($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        $booking->status = 0;
        $booking->save();

        return redirect()->route('host.reservation')->with('success', 'Booking canceled.');
    }

    public function confirmCancel($bookingId)
    {
        $booking = Booking::find($bookingId);
        
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        return view('booking.cancel', compact('booking'));
    }
}
