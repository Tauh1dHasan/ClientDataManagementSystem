<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function read_notification($id)
    {
        $user = Auth::user();
        $notification = Notification::where('id', $id)->first();
        if($notification->user_id == $user->id){
            $notification->status = 1;
            $notification->read_by = $user->id;
            $notification->read_at = now();
            $notification->save();
        }

        return redirect($notification->route_name);
    }
}
