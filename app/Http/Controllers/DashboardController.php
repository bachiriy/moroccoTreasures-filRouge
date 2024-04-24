<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\SellerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\TestFixture\func;

class DashboardController extends Controller
{
    public function index()
    {
        $sellers = User::whereIn('role', ['Seller', 'Admin', 'Super_Admin'])->get();
        foreach ($sellers as $seller) {
            $seller['products'] = Product::where('user_id', $seller->id)->get();
            $seller['in_cart'] = Cart::whereIn('product_id', $seller['products']->pluck('id'))->get()->count();
            $seller['orders'] = Order::where('seller_id', $seller->id)->count();
            $seller['products'] = $seller['products']->count();
        }
        $stats = $sellers->toArray();

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
