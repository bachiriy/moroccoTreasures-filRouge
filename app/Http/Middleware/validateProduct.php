<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class validateProduct
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->hasAny(['product_images', 'name', 'description', 'price', 'category_id'])){
            $request->validate([
                'product_images' => 'required|array|max:4',
                'product_images.*' => 'image',
                'name' => 'required|string|min:5|max:250',
                'description' => 'required|string|min:5|max:1000',
                'price' => 'required|integer|min:0|max:10000000',
                'category_id' => 'required|integer|exists:categories,id',
            ]);
        }

        return $next($request);
    }
}
