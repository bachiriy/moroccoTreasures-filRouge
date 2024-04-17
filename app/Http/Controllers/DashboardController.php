<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Pages.Dashboard.index', ['page' => 'Dashboard - Index']);
    }

    public function categories()
    {
        return view('Pages.Dashboard.categories', ['page' => 'Dashboard - Categories']);
    }

    public function users()
    {
        return view('Pages.Dashboard.users', ['page' => 'Dashboard - Users']);
    }

    public function products()
    {
        return view('Pages.Dashboard.products', ['page' => 'Dashboard - Products']);
    }
    public function requests()
    {
        $requests = SellerRequest::with('user')->get();
//        dd($requests);
        return view('Pages.Dashboard.requests', ['page' => 'Dashboard - Requests'], compact('requests'));
    }
}
