<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        // データベースからニュースレター一覧を取得
        $newsletters = Newsletter::orderBy('created_at', 'desc')->get();

        // ビューにデータを渡す
        return view('newsletter.hostNewsletter', compact('newsletters'));
    }

    public function create()
    {
        return view('newsletter.createNewsletter'); // フォームのページ
    }

    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // データを保存
        Newsletter::create([
            'title' => $validated['title'],
            'message' => $validated['message'],
        ]);

        // 一覧ページへリダイレクト
        return redirect()->route('newsletter.index')->with('success', 'Newsletter sent successfully!');
    }

}

