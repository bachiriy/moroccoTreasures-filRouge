<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\false;

class FilterByCategoryController extends Controller
{
    public function handle(string $id)
    {
        $category = Category::findOrFail($id);
        $products = Product::with('media')->where('category_id', $id)->get();
        foreach ($products as $product) {
            $product['rate'] = ReviewController::rate($product['id'])['rate'];
            $product['in_cart'] = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->get()->count() > 0;
        }

        return response()->json(['products' => $products]);
    }
}
