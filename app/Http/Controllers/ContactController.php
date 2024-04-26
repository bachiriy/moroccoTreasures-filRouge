<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function handle (Request $request) {
        foreach(User::whereIn('role', ['Admin', 'Super_Admin'])->get() as $admin){
            Mail::to($admin->email)->send(new ContactMail(request()));
        }
        return response()->json(['success' => 'Thank you! Your message has been successfully sent to all administrators of the website. We will ensure to review it promptly.']);
    }
}
