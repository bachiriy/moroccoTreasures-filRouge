@extends('Layouts.app')
@section('content')
    @include('Layouts.navbar')

    <div class=" grid grid-cols-3 my-20">
        <form method="post"
              action="/checkout/order"
              class="lg:col-span-2 col-span-3 space-y-8 px-12">
            <div class="mt-8 p-4 relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md">
                <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                    <div class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-5 h-6 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-sm font-medium ml-3">Checkout</div>
                </div>
                <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Complete your shipping and payment details below.</div>
                <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
            </div>
            <div class="rounded-md">
                <div id="payment-form">
                    <section>
                        <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping & Billing Information</h2>
                        <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Full Name</span>
                                <input name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" class="focus:outline-none px-3" placeholder="Try Odinsson" required="">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Email</span>
                                <input name="emal" class="focus:outline-none px-3" placeholder="try@gmail.com" value="{{ Auth::user()->email }}">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">Address</span>
                                <input name="address" class="focus:outline-none px-3" placeholder="N12 Hay Wisslan C Fes">
                            </label>
                            <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                <span class="text-right px-2">City</span>
                                <input name="city" class="focus:outline-none px-3" placeholder="Casablanca">
                            </label>
                            <label class="inline-flex w-2/4 border-gray-200 py-3">
                                <span class="text-right px-2">Pone Number</span>
                                <input name="phone-number" class="focus:outline-none px-3" placeholder="+212 627974538">
                            </label>

                        </fieldset>
                    </section>
                </div>
            </div>
            <div class="rounded-md">

            </div>
            <button class="submit-button px-4 py-3 rounded-full bg-gray-800 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                Confirm Order <span class="text-sm ml-4 mt-1 absolute">( {{ $total_price }} MAD ) </span>
            </button>
        </form>
        <div class="col-span-1 bg-white lg:block hidden">
            <h1 class="py-6 border-b-2 text-xl text-gray-600 px-8">Order Summary</h1>
            <ul class="py-6 border-b space-y-6 px-8">
                @foreach($carts as $cart)
                <li class="grid grid-cols-6 gap-2 border-b-1">
                    <div class="col-span-1 self-center">
                        <img src="{{ asset('storage/'.$cart->media->name) }}" alt="Product" class="rounded w-full">
                    </div>
                    <div class="flex flex-col col-span-3 pt-2">
                        <span class="text-gray-600 text-md font-semi-bold">{{ $cart->product->name }}</span>
                        <span class="text-gray-400 text-sm inline-block pt-2">{{ $cart->category->name }}</span>
                    </div>
                    <div class="col-span-2 pt-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                            <span class="text-gray-800 font-semibold inline-block">{{ $cart->product->price }} MAD</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="px-8 border-b">
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Subtotal</span>
                    <span class="font-semibold text-gray-800">{{ $total_price }} MAD</span>
                </div>
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Shipping</span>
                    <span class="font-semibold text-gray-800">Free</span>
                </div>
            </div>
            <div class="font-semibold text-xl px-8 flex justify-between py-8 text-gray-600">
                <span>Total</span>
                <span>{{ $total_price }} MAD</span>
            </div>
        </div>
    </div>

    @include('Layouts.footer')
@endsection
