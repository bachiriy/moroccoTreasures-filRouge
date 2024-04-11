<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
   public function clear_all(){
       Notification::where('user_id', Auth::id())->delete();
       return back()->with('success', 'notifications deleted.');
   }
}
