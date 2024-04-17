<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
class ReviewController extends Controller
{
    public function store(Request $request) {
        if (Review::where('user_id', Auth::id())->where('product_id', $request->product_id)->count() >= 3) {
            return back()->with('error', 'You can only add 3 review to each product.');
        }
        $request->validate([
            'content' => 'required|min:5|max:500',
            'rating' => 'required|integer|min:1|max:5'
        ]);
        Review::create([
            'content' => $request->input('content'),
            'stars' => $request->input('rating'),
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);
        return back()->with('success', 'Review created successfully.');
    }

    static function rate (string $id) {
        $product = Product::find($id);
        $total_stars = Review::where('product_id', $id)->sum('stars');
        $total_reviews = Review::where('product_id', $id)->count();
        $rate = $total_reviews > 0 ? $total_stars / $total_reviews : 0;
        return [
            'rate' => number_format($rate, 1),
            'total_reviews' => $total_reviews
        ];
    }

    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with('success', 'Review was deleted.');
    }
}
