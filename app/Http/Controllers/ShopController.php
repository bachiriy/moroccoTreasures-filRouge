<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
    public function index()
    {
        $all_products = Product::all();
        return view('Pages.shop', ['page' => 'Shop', 'all_products' => $all_products]);
    }
}
