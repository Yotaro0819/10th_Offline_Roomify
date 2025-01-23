<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;

class AccommodationController extends Controller
{
    private $accommodation;

    public function __construct(Accommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }

    public function index()
    {
        $all_accommodations = $this->accommodation->latest()->get();

        return view('acm_index_host')->with('all_accommodations', $all_accommodations);
    }
}
