@extends('Layouts.app')
@section('content')
    @include('Layouts.navbar')

    <div class="grid grid-cols-3 h-screen bg-gradient-to-r from-gray-900 to-red-950">
        <form method="post"
              action="/checkout/{{ $carts->pluck('product_id') }}"
              class="lg:col-span-2 col-span-3 space-y-8 px-12">
            @csrf
            @if(session('error'))
                <p class="text-red-500">{{ session('error') }} </p>
            @endif
            <div id="completeAlert" class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-gray-900 shadow rounded-md">
                <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                    <div class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-sm font-medium ml-3 text-white">Checkout</div>
                </div>
                <div class="text-sm tracking-wide text-gray-400 mt-4 sm:mt-0 sm:ml-4">Complete your shipping and payment details below.</div>
                <div onclick="hideCompleteAlert()" class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
            </div>
                <script>
                    let completeAlert = document.getElementById('completeAlert');
                    function hideCompleteAlert(self){
                        completeAlert.style.display = 'none';
                    }
                </script>
            <div class="rounded-md">
                <div id="payment-form">
                    @if($carts->count() > 0)
                        <section class="mt-20">
                            <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-300 my-2">Shipping & Billing Information</h2>
                            <fieldset class="mb-3 bg-gray-900 shadow-lg rounded text-gray-400">
                                <label class="flex border-b border-gray-700 h-12 py-3 items-center">
                                    <span class="text-right px-2">Full Name</span>
                                    <input name="full_name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="focus:outline-none px-3 bg-gray-900 text-gray-200 font-bold" placeholder="Try Odinsson" required="">
                                    @error('full_name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="flex border-b border-gray-700 h-12 py-3 items-center">
                                    <span class="text-right px-2">Email</span>
                                    <input name="email" class="focus:outline-none px-3 bg-gray-900 text-gray-200 font-bold" placeholder="try@gmail.com" value="{{ Auth::user()->email }}">
                                    @error('email')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="flex border-b border-gray-700 h-12 py-3 items-center">
                                    <span class="text-right px-2">Address</span>
                                    <input name="address" class="focus:outline-none px-3 bg-gray-900 text-gray-200 font-bold" placeholder="N12 Hay Wisslan C Fes">
                                    @error('address')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="flex border-b border-gray-700 h-12 py-3 items-center">
                                    <span class="text-right px-2">City</span>
                                    <input name="city" class="focus:outline-none px-3 bg-gray-900 text-gray-200 font-bold" placeholder="Casablanca">
                                    @error('city')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </label>
                                <label class="inline-flex w-2/4 border-gray-700 py-3">
                                    <span class="text-right px-2">Phone Number</span>
                                    <input name="phone_number" class="focus:outline-none px-3 bg-gray-900 text-gray-200 font-bold" placeholder="06 62 79 74 58">
                                    @error('phone_number')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </label>

                            </fieldset>
                        </section>
                    @else
                        <p class="text-gray-300">No selection.</p>
                    @endif
                </div>
            </div>
            <div class="rounded-md"></div>
            @if($carts->count() > 0)
                <button class="submit-button px-4 py-3 rounded-full bg-gradient-to-r from-gray-900 to-red-600 hover:opacity-80 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors ">
                    Confirm Order <span class="text-sm ml-4 mt-1 absolute">( {{ $total_price }} MAD ) </span>
                </button>
            @else
                <a href="/shop" class="submit-button px-4 py-3 rounded-full bg-gradient-to-r from-gray-900 to-red-600 hover:opacity-80 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                    Back Shop
                </a>
            @endif
        </form>
        <div class="col-span-1 bg-gray-900 lg:block hidden">
            <h1 class="py-6 border-b-2 text-xl text-gray-300 px-8">Order Summary</h1>
            <ul class="py-6 border-b space-y-6 px-8">
                @foreach($carts as $cart)
                    <li class="grid grid-cols-6 gap-2 border-b-1">
                        <div class="col-span-1 self-center">
                            <img src="{{ asset('storage/'.$cart->media->name) }}" alt="Product" class="rounded w-full">
                        </div>
                        <div class="flex flex-col col-span-3 pt-2">
                            <span class="text-gray-300 text-md font-semi-bold">{{ $cart->product->name }}</span>
                            <span class="text-gray-400 text-sm inline-block pt-2">{{ $cart->category->name }}</span>
                        </div>
                        <div class="col-span-2 pt-3">
                            <div class="flex items-center space-x-2 text-sm justify-between">
                                <span class="text-gray-200 font-semibold inline-block">{{ $cart->product->price }} MAD</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="px-8 border-b">
                <div class="flex justify-between py-4 text-gray-300">
                    <span>Subtotal</span>
                    <span class="font-semibold text-gray-400">{{ $total_price }} MAD</span>
                </div>
                <div class="flex justify-between py-4 text-gray-300">
                    <span>Shipping</span>
                    <span class="font-semibold text-gray-200">Free</span>
                </div>
            </div>
            <div class="font-semibold text-xl px-8 flex justify-between py-8 text-green-500">
                <span>Total</span>
                <span>{{ $total_price }} MAD</span>
            </div>
        </div>
    </div>

    @include('Layouts.footer')
@endsection
