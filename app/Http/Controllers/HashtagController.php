<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    public function index($hashtagName, $cityName = null)
    {
        $hashtag = Hashtag::where('name', $hashtagName)->firstOrFail();

        $query = $hashtag->accommodations();

        if ($cityName) {
            $query->where('city', $cityName);
        }
        $city = $cityName;

        $all_accommodations = $query->get();
        return view('accommodation.hashtag', compact('all_accommodations', 'hashtag', 'city'));
    }

}
