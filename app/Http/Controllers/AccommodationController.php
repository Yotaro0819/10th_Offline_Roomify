<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $user = Auth::user();
        $all_accommodations = $this->accommodation->where('user_id', Auth::user()->id)->latest()->paginate(3);

        // return $all_accommodations;

        return view('acm_index_host')->with('all_accommodations', $all_accommodations);
    }

    public function destroy($id)
    {
        $this->accommodation->destroy($id);

        return redirect()->route('index');
    }
}
