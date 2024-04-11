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
        $my_products = Product::where('user_id', Auth::id())->get();
        return view('Pages.Products.index', ['page' => 'My Products', 'my_products' => $my_products]);
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        return Product::find($id) ?? '<h1>404</h1>';
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
        back()->with('success', 'Product deleted.');
    }
}
