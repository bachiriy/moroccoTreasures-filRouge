@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')

    <a
        href="/products/create"
        class="fixed right-8 bottom-6 text-white bg-green-600 p-2 rounded-lg border border-green-300 hover:opacity-80 shadow-lg"
    >
        Create Product
    </a>
    <h1 class="text-center text-xl m-2 mt-6 text-gray-400">View and Manage My Products</h1>
    @if(session('success'))
        <p class="msg text-center w-75 text-green-500 transition-all border border-green-500 px-4 py-1 rounded-sm">{{ session('success') }}</p>
    @elseif(session('error'))
        <p class="msg text-center w-75 text-red-500 transition-all border border-red-500 px-4 py-1 rounded-sm">{{ session('error') }}</p>
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

    <div class="max-w-screen-lg mx-auto px-4 pt-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($my_products as $my_product)
                <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="/products/{{$my_product->id}}">
                        <div class="relative flex items-end overflow-hidden rounded-xl">
                            <img src="{{ asset('storage/' . $my_product->media[0]->name) }}" alt="Hotel Photo" class="w-full h-48 object-cover" />
                        </div>

                        <div class="mt-2 p-2">
                            <h2 class="text-sm sm:text-base text-slate-700">{{ $my_product->name }}</h2>
                            <p class="mt-1 text-xs sm:text-sm text-slate-400">{{ $my_product->category->name }}</p>

                            <div class="mt-2 flex items-center justify-between">
                                <p class="text-xs font-bold text-blue-500">{{ $my_product->price }} MAD</p>

                                <div class="flex items-center text-white duration-100">
                                    <a href="/products/{{$my_product->id}}/edit" class="text-xs p-1 bg-blue-600 hover:bg-blue-500 mr-1">Edit</a>
                                    <form action="/products/{{$my_product->id}}" method="post" class="text-xs bg-red-600 p-1 hover:bg-red-500">
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
        <div class="text-center h-96 items-center justify-center flex">
            <p>No products created.</p>
        </div>
    @endif
@endsection
