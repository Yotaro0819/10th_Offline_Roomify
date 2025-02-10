<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //

    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function index(Request $request)
{
    $search = $request->input('search');

    // 検索ワードがあればユーザー名で検索
    if ($search) {
        $all_users = User::where('name', 'like', '%' . $search . '%')
                         ->where('id', '!=', Auth::id()) // 自分を除外
                         ->get();
    } else {
        // 検索ワードがなければすべてのユーザーを表示（自分を除外）
        $all_users = User::where('id', '!=', Auth::id())->get();
    }

    // 各ユーザーとの最新メッセージを取得
    foreach ($all_users as $user) {
        $user->latest_message = Message::where(function($query) use ($user) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $user->id);
            })
            ->orWhere(function($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->where('receiver_id', Auth::id());
            })
            ->latest()
            ->first();
    }

    return view('messages.index', compact('all_users'));
}

    public function show($id)
    {
        $auth_id = Auth::user()->id;

        $all_messages = Message::where(function ($query) use ($id) {
            $query->where('sender_id', Auth::user()->id)
                ->where('receiver_id', $id);
        })
        ->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', Auth::user()->id);
        })
        ->orderBy('created_at', 'asc')  // 時系列で並べる
        ->get();

        $user = User::findOrFail($id);

        return view('messages.show', compact('user', 'all_messages'));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
        'message' => 'required|string|max:1000',
        ]);

        $sender_id = Auth::user()->id;
        $receiver_id = $id;

        $this->message = Message::create([
            'message' => $validated['message'],
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
        ]);

        return redirect()->back();
    }

    public function search(Request $request)
{
    $search = $request->input('search'); // 検索ワード（ユーザー名）

    if ($search) {
        // ユーザー名で検索
        $all_users = User::where('name', 'like', '%' . $search . '%')
                         ->where('id', '!=', Auth::id()) // 自分を除外
                         ->get();
    } else {
        // クエリが空の場合は、すべてのユーザーを表示（自分を除外）
        $all_users = User::where('id', '!=', Auth::id())->get();
    }

    // 各ユーザーとの最新メッセージを取得
    foreach ($all_users as $user) {
        $user->latest_message = Message::where(function($query) use ($user) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $user->id);
            })
            ->orWhere(function($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->where('receiver_id', Auth::id());
            })
            ->latest()
            ->first();
    }

    return view('messages.index', compact('all_users'));
}

}
