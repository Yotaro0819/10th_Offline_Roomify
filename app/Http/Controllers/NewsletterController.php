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
        return view('hostNewsletter', compact('newsletters'));
    }
}

