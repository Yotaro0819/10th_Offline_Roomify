<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function showBookingStatus($bookingId)
{
    $booking = Booking::find($bookingId);

    
    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    return view('hostRes', compact('booking'));
}
}
