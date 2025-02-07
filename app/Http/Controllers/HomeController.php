<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Accommodationデータを取得し、関連情報（カテゴリ、ハッシュタグ、ユーザーなど）も一緒にロード
        $accommodations = Accommodation::with(['categories', 'hashtags', 'photos', 'user', 'reviews'])->get();

        return view('home', compact('accommodations'));
    }
}
