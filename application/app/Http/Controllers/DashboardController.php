<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Pages.dashboard', ['page' => 'Dashboard']);
    }
}
