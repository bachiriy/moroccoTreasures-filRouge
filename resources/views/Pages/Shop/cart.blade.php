@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')

    <div class="bg-gradient-to-r from-gray-900 to-red-950 py-20 h-screen">
        <h1 class="mb-10 text-center text-2xl font-bold text-white">Cart Items</h1>
        @if(session('success'))
            <p class="text-green-500 text-sm text-center">{{ session('success') }}</p>
        @elseif(session('error'))
            <p class="text-sm text-red-500 text-center">{{ session('error') }}</p>
        @endif
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @if(count($carts) === 0)
                    <p class="mt-10 text-white">No products were added to the cart, try <a href="/shop" class="text-red-600 hover:underline">shopping</a>.</p>
                @endif
                @foreach($carts as $cart)
                    <div class="justify-between mb-6 rounded-lg bg-gray-800 p-6 shadow-md sm:flex sm:justify-start">
                        <img src="{{ asset('storage/'.$cart->media->name) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-200">{{ $cart->product->name }}</h2>
                                <p class="mt-1 text-xs text-gray-400">{{ $cart->product->description }}</p>
                            </div>
                            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex flex-col h-full justify-between items-end space-x-4">
                                    <form action="/cart/{{ $cart->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                    <p class="text-sm text-green-600">{{ $cart->product->price }} MAD</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg bg-gray-800 p-6 shadow-md md:mt-0 md:w-1/3">
                @foreach($carts as $cart)
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-200">{{ $cart->product->name }}</p>
                        <p class="text-gray-400 text-xs font-bold">{{ $cart->product->price }} <span class="text-xs text-gray-600">MAD</span> </p>
                    </div>
                @endforeach
                <hr class="my-4 border-gray-700" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold text-white">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold text-green-700">{{ $total_price }} MAD </p>
                        <p class="text-sm text-gray-400">Free shipping</p>
                    </div>
                </div>
                @if($carts->count() > 0)
                    <a href="/checkout">
                        <button class="mt-6 w-full rounded-md from-blue-800 bg-gradient-to-r to-red-950 py-1.5 font-medium text-blue-50 hover:opacity-80">Check out</button>
                    </a>
                @else
                    <a href="/shop">
                        <button class="mt-6 w-full rounded-md bg-red-500 py-1.5 font-medium text-blue-50 bg-gradient-to-r from-red-900 to-red-950">Empty Cart, Go Shop</button>
                    </a>
                @endif
            </div>
        </div>
    </div>

    @include('Layouts.footer')

@endsection
