<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($id)
    {
        $accommodation = Accommodation::with('photos')->findOrFail($id);
        return view('bookingForm')->with('accommodation', $accommodation);
    }
}
