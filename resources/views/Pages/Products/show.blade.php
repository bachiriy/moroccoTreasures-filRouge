@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')

    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">

            <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pb-2 pt-5">
                    <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="mt-2">
                    <div class="border-b border-gray-200">
                        <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                            <button id="tabs-1-tab-1" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
                            <button id="tabs-1-tab-2" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
                        </div>
                    </div>

                    <!-- 'Women' tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-1" class="space-y-12 px-4 pb-6 pt-10" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-1 items-start gap-x-6 gap-y-10">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-10">
                                <div>
                                    <p id="mobile-featured-heading-0" class="font-medium text-gray-900">Featured</p>
                                    <ul role="list" aria-labelledby="mobile-featured-heading-0" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Sleep</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Swimwear</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Underwear</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                                    <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Basic Tees</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Artwork Tees</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Bottoms</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Underwear</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Accessories</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-10">
                                <div>
                                    <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                                    <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Everything</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Core</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">New Arrivals</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Sale</a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Full Nelson</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">My Way</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Re-Arranged</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Counterfeit</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Significant Other</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 'Men' tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-2" class="space-y-12 px-4 pb-6 pt-10" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-1 items-start gap-x-6 gap-y-10">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-10">
                                <div>
                                    <p id="mobile-featured-heading-1" class="font-medium text-gray-900">Featured</p>
                                    <ul role="list" aria-labelledby="mobile-featured-heading-1" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Casual</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Boxers</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Outdoor</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <p id="mobile-categories-heading" class="font-medium text-gray-900">Categories</p>
                                    <ul role="list" aria-labelledby="mobile-categories-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Artwork Tees</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Pants</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Accessories</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Boxers</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Basic Tees</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-10">
                                <div>
                                    <p id="mobile-collection-heading" class="font-medium text-gray-900">Collection</p>
                                    <ul role="list" aria-labelledby="mobile-collection-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Everything</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Core</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">New Arrivals</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Sale</a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
                                    <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Significant Other</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">My Way</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Counterfeit</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Re-Arranged</a>
                                        </li>
                                        <li class="flex">
                                            <a href="#" class="text-gray-500">Full Nelson</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <!-- Currency selector -->
                    <form>
                        <div class="inline-block">
                            <label for="mobile-currency" class="sr-only">Currency</label>
                            <div class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                                <select id="mobile-currency" name="currency" class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                                    <option>CAD</option>
                                    <option>USD</option>
                                    <option>AUD</option>
                                    <option>EUR</option>
                                    <option>GBP</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <main class="pt-10 sm:pt-16">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-2 text-sm font-medium text-gray-900">Shop</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>

                <li class="text-sm">
                    <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $product->category->name }}</a>
                </li>
            </ol>
            <p class="text-xs text-gray-400 my-2 mx-auto max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">{{ $product->category->description }}</p>
        </nav>

        <!-- Image gallery -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
            <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                <img src="{{ asset('storage/'. $product->media[0]->name) }}" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                @if(array_key_exists(1, $product->media->toArray()))
                        <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/'. $product->media[1]->name) }}" alt="" class="h-full w-full object-cover object-center">
                        </div>
                @endif
                @if(array_key_exists(2, $product->media->toArray()))
                    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/'. $product->media[2]->name) }}" alt="" class="h-full w-full object-cover object-center">
                    </div>
                @endif
            </div>
            @if(array_key_exists(3, $product->media->toArray()))
            <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                <img src="{{ asset('storage/'. $product->media[3]->name) }}" alt="" class="h-full w-full object-cover object-center">
            </div>
            @endif
        </div>

        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">{{ $product->price }} <span class="text-lg">MAD</span> </p>

                <!-- Reviews -->
                <div class="mt-6">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        <div class="flex items-center justify-center">
                            <p class="text-gray-500 mr-3 text-xl">Rate</p>
                           {{ $rate }}
                            <svg class="text-yellow-500 h-5 w-5 flex-shrink-0 ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>

                        </div>
                        <p class="sr-only">4 out of 5 stars</p>
                        <p href="" class="ml-3 text-sm font-medium text-teal-600 hover:text-cyan-500"> {{ $total_reviews }} reviews</p>
                    </div>
                </div>

                @if(\App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('product_id', $product->id)->get()->count() === 0)
                <form class="mt-10" action="/cart/{{ $product->id }}" method="post">
                    @csrf
                    <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-gray-800 px-8 py-3 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Add to Cart
                    </button>
                </form>
                @else
                    <p class="text-sm my-4">Already in Cart, <a href="/cart" class="text-blue-500 hover:underline">Check Cart</a> </p>
                @endif
                <form action="">
                    <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-yellow-400 px-8 py-3 text-base font-medium text-gray-500 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Buy it Now
                    </button>
                </form>
            </div>

            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900">Creator Infos</h3>

                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400"><span class="text-gray-600">Name :  </span>{{ $product->user->name }}</li>
                            <li class="text-gray-400"><span class="text-gray-600">Email : </span>{{ $product->user->email }}</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                @if(session('success'))
                    <p class="text-sm text-green-500">{{ session('success') }}</p>
                @endif
                @if(session('error'))
                    <p class="text-sm text-red-500">{{ session('error') }}</p>
                @endif
                <h2 class="text-xl font-bold tracking-tight text-gray-900 mb-4">Add a Review</h2>

                <form action="/create-review/{{$product->id}}" method="post" class="border border-gray-300 rounded-md p-6">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-semibold mb-2">Content:</label>
                        <textarea id="content" name="content" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition-colors duration-150 resize-none"></textarea>
                        @error('content')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex ">
                            <div class="w-fit flex justify-center items-center pr-4">
                                <label class="block text-gray-700 font-semibold mb-2">Rating:</label>
                            </div>
                            <div class="flex">
                                <span id="star1" class="star text-xl cursor-pointer hover:opacity-60">&#9733;</span>
                                <span id="star2" class="star text-xl cursor-pointer hover:opacity-60">&#9733;</span>
                                <span id="star3" class="star text-xl cursor-pointer hover:opacity-60">&#9733;</span>
                                <span id="star4" class="star text-xl cursor-pointer hover:opacity-60">&#9733;</span>
                                <span id="star5" class="star text-xl cursor-pointer hover:opacity-60">&#9733;</span>
                            </div>
                            <input type="hidden" name="rating" id="rating">
                        </div>
                        @error('rating')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                        <button class="bg-gray-800 p-2 rounded-lg shadow-lg text-white border border-gray-200 hover:opacity-80">Create</button>
                    </div>
                </form>


                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const stars = document.querySelectorAll('.star');
                        const ratingInput = document.getElementById('rating');

                        stars.forEach((star, index) => {
                            star.addEventListener('click', () => {
                                clearStars();
                                ratingInput.value = index + 1;
                                highlightStars(index);
                            });
                        });

                        function clearStars() {
                            stars.forEach(star => {
                                star.classList.remove('text-yellow-500');
                            });
                        }

                        function highlightStars(index) {
                            for (let i = 0; i <= index; i++) {
                                stars[i].classList.add('text-yellow-500');
                            }
                        }
                    });
                </script>

                <!-- Reviews -->
                <section aria-labelledby="reviews-heading" class="border-t border-gray-200 pt-10 lg:pt-16">
                        <h2 id="reviews-heading" class="sr-only">Reviews</h2>

                        <div class="space-y-10">
                            @foreach($reviews as $review)
                                <div class="relative flex flex-col sm:flex-row">
                                    @auth
                                        @if($review->user->id === Auth::id())
                                            <form action="/remove-review/{{ $review->id }}" method="POST" class="absolute top-0 right-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this review?')" class="text-red-600 hover:text-red-900 focus:outline-none focus:text-red-900 transition duration-150 ease-in-out">
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                    <div class="order-2 mt-6 sm:ml-16 sm:mt-0">
                                        <h3 class="text-sm font-medium text-gray-900">{{ $review->content }}</h3>
                                        <div class="mt-3 space-y-6 text-sm text-gray-600">
                                            <p>{{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="order-1 flex items-center sm:flex-col sm:items-start">
                                        <img src="{{ asset('storage/' . $review->user->avatar) }}" alt="Mark Edwards." class="h-12 w-12 rounded-full">
                                        <div class="ml-4 sm:ml-0 sm:mt-4">
                                            <p class="text-sm font-medium text-gray-900">{{ $review->user->name }}</p>
                                            <div class="mt-2 flex items-center">
                                                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="{{ $review->stars >= $i ? 'text-gray-900' : 'text-gray-200' }} h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

           </div>
        </div>
        <section aria-labelledby="related-products-heading" class="bg-white">
            <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
                <h2 id="related-products-heading" class="text-xl font-bold tracking-tight text-gray-600">Discover more <span class="text-gray-900">" {{ $product->category->name }} "</span> Products</h2>
                <p class="text-xs text-gray-400 my-2 mx-auto max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">{{ $product->category->description }}</p>
                <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($similar_products as $item)
                        <div class="flex justify-center">
                            <div class="w-full sm:w-96 lg:w-64 px-2 mb-4">
                                <div class="group relative">
                                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75">
                                        <img src="{{ asset('storage/' . $item->media[0]->name) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700">
                                                <a href="#">
                                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                                    {{ $item->name }}
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">{{ $item->price }} MAD</p>
                                    </div>
                                </div>
                                <a href="/products/{{ $item->id }}" class="text-right text-sm w-full text-blue-600 hover:underline">
                                    <p>view</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    @include('Layouts.footer')
@endsection
