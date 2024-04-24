@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')




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

                @if(Auth::id() === $product->user_id)
                    <canvas id="ordersChart" width="50" height="50"></canvas>
                @else
                    @if(\App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('product_id', $product->id)->get()->count() === 0)
                    <form class="mt-10" action="/cart/{{ $product->id }}" method="post">
                        @csrf
                        <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-gray-800 px-8 py-3 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Add to Cart
                        </button>
                    </form>
                    @else
                        <form action="">
                            <a href="/cart" type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-yellow-400 px-8 py-3 text-base font-medium text-gray-500 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                See Cart
                            </a>
                        </form>
                    @endif
                @endif
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
                    <p class="msg text-sm text-green-500">{{ session('success') }}</p>
                @endif
                @if(session('error'))
                    <p class="msg text-sm text-red-500">{{ session('error') }}</p>
                @endif
                <script>
                    let msgs = document.querySelectorAll('.msg')
                    window.onload = function () {
                        setInterval(() => {
                            msgs.forEach((elm) => {
                                elm.innerHTML = '';
                                elm.style.border = 'none';
                            });
                        }, 3000);
                    };
                </script>

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

    <script>
        const orders = <?php echo json_encode($orders); ?>;
        const inCart = <?php echo json_encode($inCart); ?>;

        const ctx = document.getElementById('ordersChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Orders', 'In Cart'],
                datasets: [{
                    label: 'Orders',
                    data: [orders, 0],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'In Cart',
                    data: [0, inCart],
                    backgroundColor: 'rgba(223,62,241,0.85)',
                    borderColor: 'rgb(183,0,125)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    @include('Layouts.footer')
@endsection
