<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\SellerRequest;
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
    //    dd($request->role);
        $request->validate([
            'name' => 'required|string|min:4|max:30',
            'email' => 'required|email|unique:users|max:255|ends_with:gmail.com',
            'password' => 'required|string|min:8',
            'role' => count(User::all()) !== 0 ? 'required' : ''
        ]);
        $usrCount = count(User::all());
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);
        Notification::create([
            'title' => 'Welcome '.$user->name,
            'description' => $request->role === 'seller' ? 'You are now a member of the MHM, wait for Admin approval so you can start posting products' : ($usrCount === 0 ? 'You are the Admin of the website, you have control over the whole platform, enjoy it sir.' : 'You are now a member of the MHM, enjoy the shop.'),
            'user_id' => $user->id,
        ]);
        $user->avatar = 'images/default_avatar.png';
        $user->save();
        if ($usrCount === 0) {
            $user->role = 'Super_Admin';
            $user->save();
            return redirect('/dashboard');
        } else  if ($request->role === 'seller') {
            $user->role = 'Buyer';
            $user->save();
            SellerRequest::create(['user_id' => $user->id]);
            return redirect('/');
        } else if ($request->role === 'buyer') {
            $user->role = 'Buyer';
            $user->save();
            return redirect('/');
        }
        return 'error';
    }
}
