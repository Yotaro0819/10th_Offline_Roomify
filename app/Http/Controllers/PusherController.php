<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function broadcast(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $senderId = $request->input('sender_id');

        $chat = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $request->input('receiver_id'),
            'message' => $request->input('message'),
        ]);

        broadcast( new PusherBroadcast($request->get('message'), $request->get('receiver_id'), $request->get('sender_id')))->toOthers();

        // return view('broadcast', ['message' => $request->get('message')]);
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
            'receiver_id' => $request->get('receiver_id'),
            'sender_id' => $request->get('sender_id'),
            'data' => $chat,
        ]);
    }

    public function receive(Request $request)
    {
        $authUser = auth()->user(); // 現在の認証ユーザーを取得
        $userId = $authUser->id; // 認証ユーザーID
        $receiverId = $request->query('receiver_id'); // 受信者のIDをリクエストから取得

        // `sender_id == userId && receiver_id == receiverId` または `sender_id == receiverId && receiver_id == userId` のメッセージのみ取得
        $messages = Message::where(function ($query) use ($userId, $receiverId) {
                // 送信者がuserId、受信者がreceiverIdのパターン
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $receiverId);
            })
            ->orWhere(function ($query) use ($userId, $receiverId) {
                // 送信者がreceiverId、受信者がuserIdのパターン
                $query->where('sender_id', $receiverId)
                    ->where('receiver_id', $userId);
            })
            ->orderBy('created_at', 'asc') // 作成日順で並べる
            ->get();

        return response()->json([
            'success' => true,
            'messages' => $messages->map(function ($message) {
                return [
                    'id' => $message->id,
                    'sender_id' => $message->sender_id,
                    'receiver_id' => $message->receiver_id,
                    'message' => $message->message,
                    'created_at' => $message->created_at->format('Y-m-d H:i:s'),
                ];
            }),
        ]);
    }

}
