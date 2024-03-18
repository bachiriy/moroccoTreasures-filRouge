<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Pages.Auth.register', ['page' => 'Register']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:100',
            'email' => 'required|email|unique:users|max:255|ends_with:gmail.com',
            'password' => 'required|string|min:8'
        ]);
        $usrCount = count(User::all());
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);

        if ($usrCount === 0) {
            $user->role = 'Admin';
            $user->save();
            return redirect('/dashboard');
        } else {
            $user->role = $request->button;
            $user->save();
            return redirect('/');
        }
    }
}
