<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Accommodation;
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

        $cleaning_fee  = $accommodation->price * 0.1;
        $service_fee   = $accommodation->price * 0.15;
        $total_fee     = $accommodation->price + $cleaning_fee + $service_fee;

        return view('bookingForm')->with('accommodation', $accommodation)
                                        ->with('cleaning_fee', $cleaning_fee)
                                        ->with('service_fee', $service_fee)
                                        ->with('total_fee', $total_fee);
    }

    public function store(Request $request, $id)
    {
        $accommodation = $this->accommodation->findOrFail($id);

        $request->validate([
            'check_in_date'     => 'required|date|after_or_equal:today',
            'check_out_date'    => 'required|date|after:check_in_date',
            'num_guest'         => [
                                    'required',
                                    'integer',
                                    'min:1',
                                    'max:' . $accommodation->capacity
                                    ],
            'guest_name'        => 'required|string|max:50',
            'email'             => 'required|email',
            'special_request'   => 'nullable|max:500',
        ]);

        $this->booking->user_id          = Auth::user()->id;
        $this->booking->accommodation_id = $accommodation->id;
        $this->booking->check_in_date    = $request->check_in_date;
        $this->booking->check_out_date   = $request->check_out_date;
        $this->booking->guest_name       = $request->guest_name;
        $this->booking->num_guest        = $request->num_guest;
        $this->booking->email            = $request->email;
        $this->booking->special_request  = $request->special_request;
        $this->booking->save();

        return redirect()->route('guest.reservation_guest');
    }

//guest
    public function reservation_guest(){

        $all_bookings = $this->booking->with(['accommodation', 'user'])->where('user_id', Auth::id())->latest()->paginate(3);

        return view('guestRes', compact('all_bookings'));
    }

    public function confirmGuestCancel($bookingId)
    {
        $booking = Booking::with(['accommodation', 'user'])->find($bookingId);

        if (!$booking || $booking->user_id !== Auth::id()) {
            return redirect()->route('guest.reservation_guest')->with('error', 'Booking not found or you do not have permission to cancel it.');
        }

        return view('guest_bookingcancel', compact('booking'));
    }

    public function guestCancel($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking || $booking->user_id !== Auth::id()) {
            return redirect()->route('guest.reservation_guest')->with('error', 'Booking not found or you do not have permission to cancel it.');
        }

        $booking->status = 0;
        $booking->delete();

        return redirect()->route('guest.reservation_guest')->with('success', 'Your reservation has been canceled.');
    }
}
