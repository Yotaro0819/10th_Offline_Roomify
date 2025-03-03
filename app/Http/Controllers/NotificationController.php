<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function update($id)
    {
        $notification = Notification::findOrFail($id);

        $notification->update([
            'status' => 'read',
        ]);

        return redirect()->back();
    }

    public function confirm($id)
    {
        $notification = Notification::findOrFail($id);

        $notification->delete();

        return redirect()->back();
    }
}
