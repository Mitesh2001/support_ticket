<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = auth()->user()->notifications;

        return response()->json([
            'notifications' => $notifications,
            'status' => 'SUCCESS',
            'message' => 'Notification data fetched !']
            ,200
        );
    }

    public function markRead(Request $request,$id, $redirect = false)
    {
        $user = auth()->user();
        $notification = $user->unreadNotifications()->where('id',$id)->first();
        $notification->markAsRead();

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Notification marked as Read !']
            ,200
        );
    }

    public function markAll()
    {
        $user = auth()->user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'All Notification marked as Read !']
            ,200
        );
    }

}
