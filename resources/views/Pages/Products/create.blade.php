@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')
    <!-- component -->
    @if(session('success'))
        <div class="bg-white p-4 rounded w-10/12 lg:w-6/12 mx-auto my-8 border border-green-800">
            <p class="text-green-600">{{ session('success') }}</p>
        </div>
    @endif
    <div class="bg-white p-4 rounded w-10/12 lg:w-6/12 mx-auto my-8 border border-red-800">
        <h1 class="text-xl font-bold text-red-900">Creating Product Form</h1>
        <hr class="bg-red-800 p-[0.4px] mt-2">
        <form action="/products/12" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name"
                       class="mt-1 p-2 block w-full border focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
            </div>
            @error('name')
                <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 p-2 block w-full border focus:ring-indigo-500 focus:border-indigo-500 rounded-md"></textarea>
            </div>
            @error('description')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror
            <div class="mt-6">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price"
                       class="mt-1 p-2 block w-full border focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
            </div>
            @error('price')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror
            <div class="mt-6">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id"
                        class="mt-1 p-2 block w-full border focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                    <option value="" disabled selected>Select category</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror

            <div class="mt-6">
                <label for="product_images" class="block text-sm font-medium text-gray-700">Choose Product Image</label>
                <input type="file" name="product_images[]" multiple
                       class="mt-1 p-2 block w-full border focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
            </div>
            @error('product_images')
            <p class="text-red-400 text-sm">{{$message}}</p>
            @enderror

            <div class="mt-6">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-800 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create
                </button>
            </div>
        </form>
    </div>


@endsection
