<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function success()
    {
        $message = Notification::where('status', 'success')->first();

        return view('notification.show', compact('message'));
    }

    public function error()
    {
        $message = Notification::where('status', 'error')->first();

        return view('notification.show', compact('message'));
    }
}
