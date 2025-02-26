<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

class ProfileController extends Controller
{
    public function show($id)
    {
        // ユーザー情報を取得（ホストかゲストかに関係なく）
        $user = User::findOrFail($id);

        // ユーザーが所有する宿泊施設のレビューを取得
        $reviews = Review::whereHas('accommodation', function ($query) use ($user) {
            $query->where('host_id', $user->id);
        })->latest()->get();

        // ビューにデータを渡す
        return view('profile.guest_profile', compact('user', 'reviews'));
    }
}

