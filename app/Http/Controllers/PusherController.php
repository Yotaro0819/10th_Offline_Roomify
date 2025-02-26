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

        broadcast( new PusherBroadcast($request->get('message')))->toOthers();

        // return view('broadcast', ['message' => $request->get('message')]);
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
            'data' => $chat,
        ]);
    }

    public function receive(Request $request)
    {
        $userId = $request->query('sender_id');
        $receiverId = $request->query('receiver_id');

        $messages = Message::where(function($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)->where('receiver_id', $receiverId);
        })->orWhere(function($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', $userId);
        })
        ->orderBy('created_at', 'asc')
        ->get();

        // return view('broadcast', ['message' => $request->get('message')]);

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
