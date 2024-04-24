<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class CartController extends Controller
{
    public function destroy(string $id)
    {
        return Cart::findOrFail($id)->delete() ? back()->with('success', 'Cart was deleted.') : 'error';
    }

    public function store(string $product_id)
    {
        $product = Product::findOrFail($product_id);

        Cart::create([
            'product_id' => $product_id,
            'user_id' => Auth::id(),
        ]);
        return back()->with('success', 'Product added to cart.');
    }
}
