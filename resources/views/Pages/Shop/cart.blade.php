@extends('Layouts.app')
@section('content')
    @include('Layouts.navbar')





    <div class=" bg-gray-100 py-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
        @if(session('success'))
            <p class="text-green-500 text-sm text-center">{{ session('success') }}</p>
        @elseif(session('error'))
            <p class="text-sm text-red-500 text-center"> {{ session('error') }}</p>
        @endif
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @if(count($carts) === 0)
                    <p class="mt-10">No products were added to cart, try <span><a href="/shop" class="text-blue-600 hover:underline">shop</a></span>.</p>
                @endif
                @foreach($carts as $cart)
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <img src="{{ asset('storage/'.$cart->media->name) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900">{{ $cart->product->name }}</h2>
                            <p class="mt-1 text-xs text-gray-700">{{ $cart->product->description }}</p>
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
                                <p class="text-xl">{{ $cart->product->price }} MAD</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                @foreach($carts as $cart)
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">{{ $cart->product->name }}</p>
                    <p class="text-gray-700 text-sm">{{ $cart->product->price }} <span class="text-sm">MAD</span> </p>
                </div>
                @endforeach
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">{{ $total_price }} MAD </p>
                        <p class="text-sm text-gray-700">Free shipping</p>
                    </div>
                </div>
                <a href="/checkout">
                    <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
                </a>
            </div>
        </div>
    </div>


    @include('Layouts.footer')

@endsection
