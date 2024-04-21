<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Webmozart\Assert\Tests\StaticAnalysis\isEmptyInt;

class OrderController extends Controller
{
    /**
     * Handle user order checkout
     */
    public function store(Request $request)
    {
        if (count(json_decode($request->products_ids)) === 0) {
            return back()->with('error', 'You have to shop products to order them, cannot order no products.');
        }
        $products = [];
        foreach (json_decode($request->products_ids) as $id){
            $products[] = Product::findOrFail($id);
        }
        foreach ($products as $product) {
            Order::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'phone_number' => $request->phone_number,
                'seller_id' => $product->user_id,
                'product_id' => $product->id
            ]);
            Notification::create([
                'user_id' => $product->user_id,
                'title' => 'New order from `'.Auth::user()->name.'`',
                'description' => 'You just got an order from '.Auth::user()->name.', for the product '.$product->name,
            ]);
            Cart::where('product_id', $product->id)->delete();
        }
        Notification::create([
            'title' => 'Order Conformed',
            'description' => 'Your order is successfully received, we will call you soon to confirm and ship your order, thanks for your trust.',
            'user_id' => Auth::id()
        ]);

        $infos = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'phone_number' => $request->full_name,
        ];
        Mail::to(Auth::user()->email)->send(new OrderMail($products, $infos));
        return redirect('/shop')->with('success', 'your checkout is successful, now wait for the confirmation fo your order.');
    }

    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('warn', 'the orders was deleted from database and you won\'t have access to recover it.');
    }
}
