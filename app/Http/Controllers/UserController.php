<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('Pages.user_profile', ['page' => 'Profile']);
    }

    public function gn_update(Request $request)
    {
        $request->validate([
            'name' => 'string|min:4|max:30',
            'avatar' => 'image|max:5000',
            'email' => [
                'email',
                'max:255',
                'ends_with:gmail.com',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ]);
        $user = Auth::user();
        if ($request->avatar !== null) {
            if(Auth::user()->avatar !== null){
                Storage::disk('public')->delete(Auth::user()->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar  = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profile updated successfully !');
    }

    public function pw_update(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->input('old-password'), $user->password)) {
            return back()->withErrors(['old-password' => 'The provided old password does not match our records.']);
        }

        $request->validate([
            'old-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->input('new-password')),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
