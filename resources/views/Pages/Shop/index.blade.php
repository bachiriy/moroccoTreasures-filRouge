@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')

    <div class="pt-10  bg-white">
        <h1 class="text-center text-2xl font-bold text-gray-800">All Products</h1>
    </div>

    <!-- Tab Menu -->
    <div
        class="flex flex-wrap items-center  overflow-x-auto overflow-y-hidden py-10 justify-center   bg-white text-gray-800">
        <a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            <span>Architecto</span>
        </a>
        <a rel="noopener noreferrer" href="#"
           class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 rounded-t-lg text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
            </svg>
            <span>Corrupti</span>
        </a>
        <a rel="noopener noreferrer" href="#"
           class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            <span>Excepturi</span>
        </a>
        <a rel="noopener noreferrer" href="#"
           class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <circle cx="12" cy="12" r="10"></circle>
                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
            </svg>
            <span>Consectetur</span>
        </a>
    </div>

    <!-- Product List -->
    <section class="py-10 bg-gray-100">
        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($all_products as $product)
                <article
                    class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300">
                    <a href="/products/{{ $product->id }}">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $product->media[0]->name) }}" alt="Product Photo"
                                 class="w-full h-64 object-cover rounded-xl">
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-white bg-opacity-75 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-1"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm text-slate-400">{{ $product->rate }}</span>
                            </div>
                        </div>

                        <div class="mt-3 p-2">
                            <h2 class="text-lg font-semibold text-slate-700">{{ $product->name }}</h2>
                            <p class="text-sm text-slate-400">{{ $product->category->name }}</p>

                            <div class="flex items-center justify-between mt-2">
                                <p class="text-xs font-semibold text-blue-500">{{ $product->price }} MAD</p>
                                @if(\App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('product_id', $product->id)->get()->count() === 0)
                                    <form action="/cart/{{$product->id}}" method="post">
                                        @csrf
                                        <button type="submit"
                                                class="text-sm bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded-lg duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor" class="h-4 w-4 inline-block -mt-1 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M4 6h16M4 12h16m-7 6h7"></path>
                                            </svg>
                                                <span>Add to cart</span>
                                        </button>
                                    </form>
                                    @else
                                        <a href="/cart"
                                            type="submit"
                                            class="text-sm bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-4 rounded-lg duration-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor" class="h-4 w-4 inline-block -mt-1 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M4 6h16M4 12h16m-7 6h7"></path>
                                            </svg>
                                            <span>Check Cart</span>
                                        </a>
                                    @endif
                            </div>
                        </div>
                    </a>
                </article>

            @endforeach


        </div>
    </section>

    @include('Layouts.footer')
@endsection
