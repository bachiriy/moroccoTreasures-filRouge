<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $all_products = Product::with(['media', 'category'])->get();
        foreach ($all_products as $item) {
            $item['rate'] = ReviewController::rate($item['id'])['rate'];
        }
//        dd($all_products);
        return view('Pages.Shop.index', ['page' => 'Shop', 'all_products' => $all_products]);
    }

    public function cart()
    {
        $carts = Cart::with(['product', 'user'])->where('user_id', Auth::id())->get();
        foreach ($carts as $cart) {
            $cart['media'] = Media::where('product_id', $cart->product_id)->first();
        }

        $total_price = $carts->pluck('product')->sum('price');

        return view('Pages.Shop.cart', ['page' => 'Cart'], compact('carts', 'total_price'));
    }

    public function checkout()
    {
        $carts = Cart::with(['product', 'user'])->where('user_id', Auth::id())->get();
        foreach ($carts as $cart) {
            $cart['media'] = Media::where('product_id', $cart->product_id)->first();
            $cart['category'] = Category::find($cart->product->category_id);
        }

        $total_price = $carts->pluck('product')->sum('price');

        return view('Pages.Shop.checkout', ['page' => 'Checkout'], compact('carts', 'total_price'));
    }
}
