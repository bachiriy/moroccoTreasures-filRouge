<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Product;
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
        return view('Pages.Products.index', ['page' => 'My Products']);
    }

    public function create()
    {
        return view('Pages.Products.create', ['page' => 'Create Product']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->file('product_image'));
        $data = $request->validate([
            'product_images' => 'required|array',
            'product_images.*' => 'image',
            'name' => 'required|string|min:5|max:250',
            'description' => 'required|string|min:5|max:1000',
            'price' => 'required|integer|min:0|max:100000',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => Auth::id()
        ]);
//        dd($product);
        foreach ($request->file('product_images') as $index => $item) {
            $path = $request->product_images[$index]->store('products/' . $product->id , 'public');
            Media::create([
                'name' => $path,
                'product_id' => $product->id
            ]);
        }
        return back()->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'one product';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
