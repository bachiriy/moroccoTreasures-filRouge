<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SellerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\TestFixture\func;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = User::groupBy('role')
            ->selectRaw('count(*) as count, role')
            ->pluck('count', 'role')
            ->toArray();
        return view('Pages.Dashboard.index', ['page' => 'Dashboard - Index'], compact('stats'));
    }


    public function users()
    {
        return view('Pages.Dashboard.users', ['page' => 'Dashboard - Users']);
    }

    public function products()
    {
        $products = Product::with(['category', 'media', 'user'])->get();

        return view('Pages.Dashboard.products', ['page' => 'Dashboard - Products'], compact('products'));
    }
    public function requests()
    {
        $requests = SellerRequest::with('user')->get();
//        dd($requests);
        return view('Pages.Dashboard.requests', ['page' => 'Dashboard - Requests'], compact('requests'));
    }
}
