@extends('Layouts.app')

@section('content')
@include('Layouts.navbar')

<div class="bg-gradient-to-r from-gray-900 to-red-950 py-10 w-screen">
    <div class="relative h-32">
        <a href="/products/create" class="absolute right-8 bottom-6 text-white border border-green-900 bg-gradient-to-r from-gray-900 to-green-600 p-2 rounded-lg  hover:opacity-80 shadow-lg">
            Create Product
        </a>
        <a href="/orders" class="absolute right-8 bottom-20 text-white bg-gradient-to-r from-gray-900 to-blue-600 p-2 rounded-lg border border-blue-800 hover:opacity-80 shadow-lg">
            Check Orders
        </a>
    </div>
    <h1 class="text-center text-xl pt-6 text-gray-400">View and Manage My Products</h1>
    @if(session('success'))
    <p class="msg text-center w-75 text-green-500 transition-all border border-green-500 px-4 py-1 rounded-sm">{{ session('success') }}</p>
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

    <div class="max-w-screen-lg mx-auto px-4 pt-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($my_products as $my_product)
            <article class="rounded-xl bg-gray-900 p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <a href="/products/{{$my_product->id}}">
                    <div class="relative flex items-end overflow-hidden rounded-xl">
                        <img src="{{ asset('storage/' . $my_product->media[0]->name) }}" alt="Hotel Photo" class="w-full h-48 object-cover" />
                    </div>

                    <div class="mt-2 p-2">
                        <h2 class="text-sm sm:text-base text-slate-400">{{ $my_product->name }}</h2>
                        <p class="mt-1 text-xs sm:text-sm text-slate-600">{{ $my_product->category->name }}</p>

                        <div class="mt-2 flex items-center justify-between">
                            <p class="text-xs font-bold text-green-700">{{ $my_product->price }} MAD</p>

                            <div class="flex items-center text-white duration-100">
                                <a href="/products/{{$my_product->id}}/edit" class="text-xs py-1 px-2 shadow-lg rounded-full bg-gradient-to-r from-gray-800 to-blue-700 hover:opacity-80 mr-1">Edit</a>
                                <form action="/products/{{$my_product->id}}" method="post" class="text-xs bg-gradient-to-r from-gray-900 to-red-800 py-1 px-2 rounded-full hover:opacity-80">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('You sure you want to delete this product ?')">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
    @if(count($my_products) === 0)
    <div class="text-center h-96 text-gray-200 items-center justify-center flex">
        <p>No products created.</p>
    </div>
    @endif

    <div class="bg-gradient-to-r from-gray-900 to-red-950 pt-10 px-10">
        {{ $my_products->links() }}
    </div>

</div>
@include('Layouts.footer')
@endsection