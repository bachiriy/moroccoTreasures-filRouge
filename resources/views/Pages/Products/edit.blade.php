
@extends('Layouts.app')

@section('content')
@include('Layouts.navbar')

<div class="bg-gradient-to-r py-10 from-blue-950 to-red-950">
    @if(session('success'))
    <div class="msg bg-gradient-to-r from-gray-900 to-red-950 p-4 rounded w-10/12 lg:w-6/12 mx-auto my-8 border border-green-800">
        <p class="text-green-600">{{ session('success') }}</p>
    </div>
    @endif
    <script>
        let msg = document.querySelector('.msg')
        window.onload = function() {
            setInterval(() => {
                msg.style.display = 'none';
            }, 3000);
        };
    </script>
    <div class="bg-gray-900 p-4 rounded w-10/12 lg:w-6/12 mx-auto border border-red-800">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold text-red-900">Update Product</h1>
            <a href="/products" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-product-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </a>
        </div>
        <hr class="bg-red-800 p-[0.4px] mt-2">
        <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-6">
                <label for="name" class="block text-sm font-medium text-gray-300">Product Name</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="mt-1 p-2 bg-gradient-to-r text-white from-gray-900 to-red-950 block w-full border focus:ring-red-500 focus:border-red-500 rounded-md">
            </div>
            @error('name')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-300">Product Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 p-2 bg-gradient-to-r text-white from-gray-900 to-red-950 block w-full border focus:ring-red-500 focus:border-red-500 rounded-md">{{ $product->description }}</textarea>
            </div>
            @error('description')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror
            <div class="mt-6">
                <label for="price" class="block text-sm font-medium text-gray-300">Price</label>
                <input type="text" name="price" id="price" value="{{ $product->price }}" class="mt-1 p-2 bg-gradient-to-r text-white from-gray-900 to-red-950 block w-full border focus:ring-red-500 focus:border-red-500 rounded-md">
            </div>
            @error('price')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror
            <div class="mt-6">
                <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
                <select name="category_id" id="category_id" class="mt-1 bg-red-950 p-2 text-white  block w-full border focus:ring-red-500 focus:border-red-500 rounded-md">
                    <option value="" disabled>Select category</option>
                    @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" class="bg-red-900">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror

            <div class="my-6">
                <input type="checkbox" id="checkbox" class="text-red-500">
                <label for="checkbox" class="mx-2 text-gray-300">Upload new images ?</label>
            </div>

            <div id="upload-product-images">

            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-lg text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-900 to-blue-950 focus:outline-none hover:opacity-80 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Product
                </button>
            </div>
        </form>
    </div>

</div>
@include('Layouts.footer')
<script>
        let div = document.getElementById('upload-product-images');
        let checkbox = document.getElementById('checkbox');
        let x = `<div class="mt-6">
                <label for="product_images" class="block text-sm font-medium text-gray-300">Choose Product Image</label>
                <input type="file" name="product_images[]" multiple
                       class="mt-1 p-2 block w-full bg-gradient-to-r from-gray-900 text-gray-300 to-red-950 border focus:ring-red-500 focus:border-red-500 rounded-md">
            </div>
            @error('product_images')
                <p class="text-blue-400 text-sm">{{$message}}</p>
            @enderror`;
        checkbox.addEventListener('click', () => {
            if (checkbox.checked) {
                div.innerHTML = x;
            }
            if (!checkbox.checked) {
                div.innerHTML = '';
            }
        });
        if (checkbox.checked) {
            div.innerHTML = x;
        }
    </script>
@endsection
