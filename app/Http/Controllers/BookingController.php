<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\Notification;
use App\Models\User;

class BookingController extends Controller
{
    //
    private $booking;
    private $accommodation;

    public function __construct(Booking $booking, Accommodation $accommodation){

        $this->booking = $booking;
        $this->accommodation = $accommodation;
    }

    public function reservation_host(){


        $accommodationIds = $this->accommodation->where('user_id', Auth::id())->pluck('id')->toArray();

        $all_bookings = $this->booking->with(['accommodation', 'guest', 'host'])->whereIn('accommodation_id', $accommodationIds)->latest()->paginate(3);

        return view('reservation/hostRes', compact('all_bookings'));

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

        // create important notification -araki
        Notification::create([
            'receiver_id' => $booking->guest_id,
            'title' => 'Host canceled your Booking',
            'notification' => $booking->guest_name . ' canceled the booking of '. $booking->accommodation->name,
        ]);

        return redirect()->route('host.reservation_host')->with('success', 'Booking canceled.');
    }

    public function confirmCancel($bookingId)
    {
        $booking = Booking::with(['accommodation', 'guest', 'host'])->find($bookingId);

        if (!$booking) {
            return redirect()->route('host.reservation_host')->with('error', 'Booking not found.');
        }

        return view('reservation/bookingcancel', compact('booking'));

    }

    public function create($id)
    {
        $accommodation = Accommodation::with('photos')->findOrFail($id);

        $cleaning_fee  = $accommodation->price * 0.1;
        $service_fee   = $accommodation->price * 0.15;
        $total_fee     = $accommodation->price + $cleaning_fee + $service_fee;

        // session(['total_fee' => $total_fee]);

        return view('bookingForm')->with('accommodation', $accommodation)
                                        ->with('cleaning_fee', $cleaning_fee)
                                        ->with('service_fee', $service_fee)
                                        ->with('total_fee', $total_fee);
    }

    // public function store(Request $request, $id)
    // {
    //     $accommodation = $this->accommodation->findOrFail($id);
    //     $hostId = $accommodation->user_id;
    //     $hostName = User::findOrFail($hostId)->name;

    //     $request->validate([
    //         'check_in_date'     => 'required|date|after_or_equal:today',
    //         'check_out_date'    => 'required|date|after:check_in_date',
    //         'num_guest'         => [
    //                                 'required',
    //                                 'integer',
    //                                 'min:1',
    //                                 'max:' . $accommodation->capacity
    //                                 ],
    //         'guest_name'        => 'required|string|max:50',
    //         'guest_email'             => 'required|email',
    //         'special_request'   => 'nullable|max:500',
    //     ]);

    //     $this->booking->guest_id         = Auth::user()->id;
    //     $this->booking->host_id          = $hostId;
    //     $this->booking->accommodation_id = $accommodation->id;
    //     $this->booking->check_in_date    = $session()->check_in_date;
    //     $this->booking->check_out_date   = $session()->check_out_date;
    //     $this->booking->host_name        = $hostName;
    //     $this->booking->guest_name       = $session()->guest_name;
    //     $this->booking->num_guest        = $session()->num_guest;
    //     $this->booking->guest_email      = $session()->guest_email;
    //     $this->booking->special_request  = $session()->special_request;
    //     $this->booking->save();

    //     return redirect()->route('guest.reservation_guest');
    // }

//guest
    public function reservation_guest(){

        $all_bookings = $this->booking->with(['accommodation', 'guest', 'host'])->where('guest_id', Auth::id())->latest()->paginate(3);


        return view('reservation/guestRes', compact('all_bookings'));
    }

    public function confirmGuestCancel($bookingId)
    {
        $booking = Booking::with(['accommodation', 'guest', 'host'])->find($bookingId);

        if (!$booking || $booking->guest_id !== Auth::id()) {
            return redirect()->route('guest.reservation_guest')->with('error', 'Booking not found or you do not have permission to cancel it.');
        }

        return view('reservation/guest_bookingcancel', compact('booking'));
    }

    public function guestCancel($bookingId)
    {
        $booking = Booking::find($bookingId);

        if (!$booking || $booking->guest_id !== Auth::id()) {
            return redirect()->route('guest.reservation_guest')->with('error', 'Booking not found or you do not have permission to cancel it.');
        }

        $booking->status = 0;
        $booking->delete();

        // create important notification -araki
        Notification::create([
            'receiver_id' => $booking->host_id,
            'title' => 'Guest Canceled your Booking',
            'notification' => $booking->guest_name . ' canceled the booking of '. $booking->accommodation->name,
        ]);

        return redirect()->route('guest.reservation_guest')->with('success', 'Your reservation has been canceled.');
    }
}
