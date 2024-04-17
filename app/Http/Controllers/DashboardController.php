<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SellerRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Pages.Dashboard.index', ['page' => 'Dashboard - Index']);
    }


    public function users()
    {
        return view('Pages.Dashboard.users', ['page' => 'Dashboard - Users']);
    }

    public function products()
    {
        $products = Product::with(['category', 'media', 'user', 'reviews'])->get();

        return view('Pages.Dashboard.products', ['page' => 'Dashboard - Products'], compact('products'));
    }
    public function requests()
    {
        $requests = SellerRequest::with('user')->get();
//        dd($requests);
        return view('Pages.Dashboard.requests', ['page' => 'Dashboard - Requests'], compact('requests'));
    }
}
