<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $review;

    public function __construct(Review $review) {
        $this->review = $review;
    }


    public function store(Request $request, $id)
    {
        // バリデーション
        $validated = $request->validate([
            'star' => 'nullable|numeric|min:0|max:5',
            'comment' => 'required|required|string',
        ]);

        // ユーザーIDを取得
        $user_id = Auth::id(); // Auth::user()->id の省略形

        // 宿泊施設の取得
        $accommodation = Accommodation::findOrFail($id);
        $reviews = Review::latest()->get();

        // **宿泊施設を所有するホストのIDを取得
        $host_id = $accommodation->user_id;

        // レビューを作成
        $review = new Review();
        $review->user_id = $user_id;
        $review->accommodation_id = $accommodation->id;
        $review->star = $validated['star'] ?? 0; // nullなら0を代入
        $review->comment = $validated['comment'];
        $review->save();

        // レビューのリストを取得して宿泊施設の詳細ページに渡す
        $reviews = Review::where('accommodation_id', $accommodation->id)->latest()->get();

        // 宿泊施設の詳細ページへリダイレクト
        return redirect()->route('accommodation.show', $accommodation->id)
                        ->with('reviews', $reviews);
    }

    public function average($id)
    {
        $reviews = Review::where('accommodation_id', $id)->get();
        return $reviews->count() > 0 ? $reviews->sum('star') / $reviews->count() : 0;
    }
}

