<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_products = Product::where('user_id', Auth::id())->with(['category', 'media'])->get();
        return view('Pages.Products.index', ['page' => 'My Products', 'my_products' => $my_products]);
    }

    public function create()
    {
//        dd('ok');
        return view('Pages.Products.create', ['page' => 'My Products']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ]);
//        dd($product);
        if(count($request->file('product_images')) > 4){
            return back()->withErrors('product_images', 'Can not upload more than 4 images for the product.');
        }
        foreach ($request->file('product_images') as $index => $item) {
            $path = $request->product_images[$index]->store('products/' . $product->id , 'public');
            Media::create([
                'name' => $path,
                'product_id' => $product->id
            ]);
        }
        return back()->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->with(['category', 'media'])->where('user_id', Auth::id())->first();
        return $product ? view('Pages.Products.edit', ['page' => 'Products - Update'], compact('product')) : abort(404);
    }

    public function show(string $id)
    {
//        dd('ok');
        $product = Product::where('id', $id)->with(['category', 'media', 'user'])->first();
        if ($product === null) {
            abort(404);
        }
        $reviews = Review::with('user', 'product')->where('product_id', $id)->get();
        $similar_products = Product::where('category_id', $product->category_id)->with('media')->take(3)->get();
        $review_rate = ReviewController::rate($product->id);
        $rate = $review_rate['rate'];
        $total_reviews = $review_rate['total_reviews'];

        return $product ? view('Pages.Products.show', ['page' => 'Shop'], compact('product', 'reviews', 'similar_products', 'rate', 'total_reviews')) : abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();
        if($request->has('product_images')) {
            Media::where('product_id', $id)->delete();
            Storage::disk('public')->deleteDirectory('products/'.$id);
            foreach($request->product_images as $product_image){
                $path = $product_image->store('products/'. $id, 'public');
                Media::create(['name' => $path, 'product_id' => $id]);
            }
        }
        return back()->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Product::find($id) === null){
            return back()->with('error', 'Product not found.');
        }
        Storage::disk('public')->deleteDirectory('products/'.$id);

        Product::destroy($id);
        return back()->with('success', 'Product deleted.');
    }
}
