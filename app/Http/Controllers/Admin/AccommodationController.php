<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Auth;


class AccommodationController extends Controller
{
    public function index()
    {
        $all_accommodations = $this->accommodation->latest()->paginate(6);

        return view('admin.accommodation.index')->with('all_accommodations', $all_accommodations);
    }
}
