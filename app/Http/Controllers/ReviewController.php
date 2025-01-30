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
        $validated = $request->validate([
            'star' => 'required|numeric|min:0|max:5',
            'comment' => 'required|string',
            // 'photos' => 'nullable|array',
            // 'photos.*' => 'image|mimes:jpeg,jpg,png,gif|max:1048',
        ]);

        $user_id = Auth::user()->id;
        $accommodation_id = Accommodation::findOrFail($id);
        $reviews = Review::all();

        $this->review->create([
            'user_id' => $user_id,
            'accommodation_id' => $accommodation_id,
            'star' => $validated['star'],
            'comment' => $validated['comment']
        ]);

        return redirect()->route('accommodation.show', $accommodation_id->id)->with('reviews', $reviews);
    }
}
