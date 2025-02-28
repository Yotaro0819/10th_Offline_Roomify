<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        // ホストが所有する宿泊施設の ID を取得
        $accommodationIds = $user->accommodations->pluck('id');

        // その宿泊施設に紐づくレビューを取得
        $reviews = Review::whereIn('accommodation_id', $accommodationIds)->latest()->get();

        return view('profile.guest_profile', compact('user', 'reviews'));
    }

}

