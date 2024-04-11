<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Pages.dashboard.index', ['page' => 'Dashboard - Index']);
    }

    public function categories()
    {
        return view('Pages.dashboard.categories', ['page' => 'Dashboard - Categories']);
    }

    public function users()
    {
        return view('Pages.dashboard.users', ['page' => 'Dashboard - Users']);
    }

    public function products()
    {
        return view('Pages.dashboard.products', ['page' => 'Dashboard - Products']);
    }
    public function requests()
    {
        return view('Pages.dashboard.requests', ['page' => 'Dashboard - Requests']);
    }
}
