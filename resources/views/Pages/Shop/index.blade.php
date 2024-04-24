@extends('Layouts.app')

@section('content')
@include('Layouts.navbar')

<div class="pt-10 from-gray-900 bg-gradient-to-r to-red-950">
    <h1 class="text-center text-2xl font-bold text-white">All Products</h1>
</div>

<!-- Tab Menu -->
<div class="flex flex-wrap items-center duration-100 py-10 justify-center transition-all from-gray-900 bg-gradient-to-r to-red-950 text-white">
    <p class="catBtns border-2 border-gray-800 p-4 rounded-lg mx-6 cursor-pointer" onclick="window.location.href = '/shop'">All</p>
    @foreach(\App\Models\Category::all() as $category)
    <button value="{{ $category->name }}" rel="noopener noreferrer" onclick="filterByCategory(this, {{ $category->id }})" class="catBtns cursor-pointer flex items-center flex-shrink-0 px-5 py-3 space-x-2 text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
        </svg>
        <span class="relative group">
            {{ $category->name }}
            <span class="absolute top-full left-0 w-64 rounded-lg bg-gray-800 text-white px-4 py-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300 overflow-y-auto">
                {{ $category->description }}
            </span>
        </span>


    </button>
    @endforeach


</div>

@if(session('success'))
<p class="msg text-center w-75 bg-gradient-to-r from-gray-900 to-red-950 text-green-500 transition-all border border-green-500 px-4 py-1 rounded-sm">{{ session('success') }}</p>
@elseif(session('error'))
<p class="msg text-center w-75 text-red-500 transition-all border border-red-500 px-4 py-1 rounded-sm">{{ session('error') }}</p>
@endif
<script>
    let msgs = document.querySelectorAll('.msg')
    window.onload = function() {
        setInterval(() => {
            msgs.forEach((elm) => {
                elm.innerHTML = '';
                elm.style.border = 'none';
            });
        }, 3000);
    };
</script>

<!-- Product List -->
<section class="py-10 bg-gradient-to-r from-gray-900 to-red-950">
    <div class="productsSection mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($all_products as $product)
        <article class="rounded-xl bg-gray-900 p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300">
            <a href="/products/{{ $product->id }}">
                <div class="relative">
                    <img src="{{ asset('storage/' . $product->media[0]->name) }}" alt="Product Photo" class="w-full h-64 object-cover rounded-xl">
                    <div class="absolute bottom-0 left-0 right-0 p-2 bg-gray-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-white">{{ $product->rate }}</span>
                    </div>
                </div>

                <div class="mt-3 p-2">
                    <h2 class="text-lg font-semibold text-white">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-400">{{ $product->category->name }}</p>

                    <div class="flex items-center justify-between mt-2">
                        <p class="text-xs font-semibold text-green-600">{{ $product->price }} MAD</p>
                        @if(Auth::id() !== $product->user_id)
                        @if(\App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())->where('product_id', $product->id)->get()->count() === 0)
                        <form action="/cart/{{$product->id}}" method="post">
                            @csrf
                            <button type="submit" class="text-sm bg-gradient-to-r from-green-900 to-purple-950  hover:opacity-90 text-white py-1 px-4 rounded-lg duration-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 inline-block -mt-1 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                                <span>Add to cart</span>
                            </button>
                        </form>
                        @else
                        <a href="/cart" type="submit" class="text-sm bg-gradient-to-r from-yellow-900 hover:opacity-90 to-red-950 text-white py-1 px-4 rounded-lg duration-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 inline-block -mt-1 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                            <span>Check Cart</span>
                        </a>
                        @endif
                        @else
                        <a href="/products/{{ $product->id }}" type="submit" class="text-sm bg-gradient-to-r from-yellow-900 to-red-950 hover:opacity90 text-white py-1 px-4 rounded-lg duration-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 inline-block -mt-1 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                            <span>View</span>
                        </a>
                        @endif
                    </div>
                </div>
            </a>
        </article>

        @endforeach

        
    </div>
</section>
<div class="bg-gradient-to-r from-gray-900 to-red-950 py-2 pb-10 px-10">
    {{ $all_products->links() }}
</div>

@include('Layouts.footer')

<script>
    let section = document.querySelector('.productsSection');
    let catBtns = document.querySelectorAll('.catBtns');

    let clearBtns = () => {
        catBtns.forEach((btn) => {
            btn.classList.remove('border-2', 'border-gray-900', 'p-4', 'rounded-lg');
        });
    }

    let filterByCategory = (self, category) => {
        section.innerHTML = '';
        clearBtns();
        self.classList.add('border-2', 'border-gray-800', 'p-4', 'rounded-lg');

        fetch(`http://127.0.0.1:8000/api/shop/${category}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.products.length === 0) {
                    section.innerHTML = '<p class="text-center text-xl my-8 font-bold text-gray-400 ">No records found.</p>'
                } else {
                    data.products.forEach((product) => {

                        section.innerHTML += `
                                 <article
                                    class="rounded-xl bg-gray-900 p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300">
                                    <a href="/products/${product.id}">
                                        <div class="relative">
                                            <img src="/storage/${product.media[0].name}" alt="Product Photo" class="w-full h-64 object-cover rounded-xl">
                                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gray-900 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-1"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                <span class="text-sm text-white">${product.rate}</span>
                                            </div>
                                        </div>

                                        <div class="mt-3 p-2">
                                            <h2 class="text-lg font-semibold text-white">${product.name}</h2>
                                            <p class="text-sm text-gray-400">${self.value}</p>

                                            <div class="flex items-center justify-between mt-2">
                                                <p class="text-xs font-semibold text-blue-400">${product.price} MAD</p>
                                                <a href="/products/${product.id}"
                                                    type="submit"
                                                    class="text-sm bg-gradient-to-r from-yellow-900 to-red-950 text-white py-1 px-4 rounded-lg duration-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                         stroke="currentColor" class="h-4 w-4 inline-block -mt-1 mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M4 6h16M4 12h16m-7 6h7"></path>
                                                    </svg>
                                                    <span>View</span>
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            `;
                    })
                }
                console.log(data);
            })
    }
</script>
@endsection