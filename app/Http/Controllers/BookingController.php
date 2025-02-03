<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    private $booking;
    private $accommodation;

    public function __construct(Booking $booking, Accommodation $accommodation){
        
        $this->booking = $booking;
        $this->accommodation = $accommodation;
    }

    public function reservation_host(){
       
        // $all_bookings = $this->booking->where('user_id', Auth::user()->id)->latest()->paginate(3);
        // $all_accommodations = $this->accommodation->where('user_id', Auth::user()->id)->get();
        // $all_bookings = $this->booking->where('user_id', Auth::user()->id)->get();

        // return view('hostRes')->with('all_bookings', $all_accommodations);

        $accommodationIds = $this->accommodation->where('user_id', Auth::id())->select('id');

        $all_bookings = $this->booking->with(['accommodation', 'user'])->whereIn('accommodation_id', $accommodationIds)->latest()->paginate(3);

        return view('hostRes', compact('all_bookings'));
    
    }

    // public function showBookingStatus($bookingId)
    // {
    //     // $booking = Booking::find($bookingId);
    //     $all_bookings = $this->booking->get();

    //     // if (!$booking) {
    //     //     return redirect()->back()->with('error', 'Booking not found.');
    //     // }

    //     return view('hostRes')->with('all_bookings', $all_bookings);
    // }

    public function cancel($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        $booking->status = 0;
        $booking->delete();

        return redirect()->route('host.reservation_host')->with('success', 'Booking canceled.');
    }

    public function confirmCancel($bookingId)
    {
        $booking = Booking::with(['accommodation', 'user'])->find($bookingId);
        
        if (!$booking) {
            return redirect()->route('host.reservation_host')->with('error', 'Booking not found.');
        }
        
        return view('bookingcancel', compact('booking'));

    }

    public function create($id)
    {
        $accommodation = Accommodation::with('photos')->findOrFail($id);
        return view('bookingForm')->with('accommodation', $accommodation);
    }
}
