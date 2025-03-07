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

    public function updateAvatar(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::where('id', $id)->first();

        // 古い画像を削除
        if ($user->avatar) {
            $oldPath = str_replace(Storage::disk('S3')->url(''), '', $user->avatar);
            Storage::disk('s3')->url($oldPath);
        }

        // 新しい画像を保存
        $path = $request->file('avatar')->store('avatars', 's3');
        $url = Storage::disk('s3')->url($path);
        // データベースを更新
        $user->avatar = $url;
        $user->save();

        return back()->with('success', 'プロフィール画像が更新されました！');
    }

    public function edit()
    {
        $user = auth()->user(); // 現在ログイン中のユーザー情報を取得
        return view('profile.edit', compact('user')); // ビューに $user を渡す
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'about_me' => 'nullable|string|max:120',
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about_me' => $request->about_me,
        ]);

        return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'Profile updated successfully!');
    }
}

