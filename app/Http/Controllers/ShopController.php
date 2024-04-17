<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function index()
    {
        $all_products = Product::with(['media', 'category'])->get();
        foreach ($all_products as &$item) {
            $item['rate'] = ReviewController::rate($item['id'])['rate'];
        }
//        dd($all_products);
        return view('Pages.shop', ['page' => 'Shop', 'all_products' => $all_products]);
    }
}
