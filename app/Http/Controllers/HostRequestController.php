<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HostRequest;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class HostRequestController extends Controller
{
    public function create()
    {
        return view('hostRequest/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string|max:500',
        ]);

        HostRequest::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('hostRequest.create')->with('success', 'Send request was successful');
    }

    public function index()
    {
        $requests = HostRequest::where('status', 'pending')->get();
        return view('hostRequest.index')->with('requests', $requests);
    }

    public function approve($id)
    {
        $request = HostRequest::findOrFail($id);
        $request->update(['status' => 'approved']);
        $request->user->update(['role' => '2']);

        return back()->with('success', 'approved');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        $hostRequest = HostRequest::findOrFail($id);
        $hostRequest->update(['status' => 'rejected']);
        $receiver_id = $hostRequest->user->id;
        $title = 'Your request was rejected.';

        Notification::create([
            'receiver_id' => $receiver_id,
            'notification' => $request->reason,
            'title' => $title,
        ]);

        return back()->with('error', 'rejected');
    }
}

