<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // 古い画像を削除
        if ($user->avatar) {
            Storage::delete('public/' . $user->avatar);
        }

        // 新しい画像を保存
        $path = $request->file('avatar')->store('avatars', 'public');

        // データベースを更新
        $user->avatar = $path;
        $user->save();

        return back()->with('success', 'プロフィール画像が更新されました！');
    }


}

