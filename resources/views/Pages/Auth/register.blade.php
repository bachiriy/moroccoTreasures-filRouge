@extends('Layouts.app')
@section('content')
@include('Layouts.navbar')
<div class="bg-gray-100 flex justify-center items-center md:h-screen">
    <!-- Left: Image -->
    <div class="w-1/2 h-screen hidden lg:block">
        <img src="{{ asset('storage/images/image2.jpg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>
    <!-- Right: Registration Form -->
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <h1 class="text-2xl font-semibold mb-4">Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-gray-600">Name</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="Name" value="{{ old('name') }}" autocomplete="name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="Email" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="Password" autocomplete="new-password">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            @if(count(\App\Models\User::all()) > 0)
            <!-- Role Selection -->
            <div class="mb-4">
                <label class="block text-gray-600">Register as:</label>
                <div class="flex items-center">
                    <input type="radio" id="buyer" name="role" value="buyer" class="text-red-500">
                    <label for="buyer" class="text-gray-600 ml-2">Buyer</label>
                    <input type="radio" id="seller" name="role" value="seller" class="text-red-500 ml-4">
                    <label for="seller" class="text-gray-600 ml-2">Seller</label>
                </div>
                <p id="sellerNotice" style="display: none;" class="text-gray-600 text-sm">Notice that you will have seller role, and have access to create and manage products, only after one of the Admins accepted your request.</p>
                @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            @else
                <p class="text-green-500 my-4">You are going to be the Admin</p>
            @endif
            <!-- Register Button -->
            <button type="submit" class="bg-red-800 hover:bg-red-600 text-white font-semibold rounded-md py-2 px-4 w-full">Register</button>
        </form>
        <!-- Login Link -->
        <div class="mt-6 text-blue-900 text-center">
            <a href="{{ route('login') }}" class="hover:underline">Already have an account? Log in here</a>
        </div>
    </div>
</div>
<script>
    let seller = document.getElementById('seller');
    let buyer = document.getElementById('buyer');
    let sellerNotice = document.getElementById('sellerNotice');
    let showNotice = () => {
        if(seller.checked){
            sellerNotice.style.display = 'block';
        }
    };
    showNotice();
    seller.addEventListener('click', ()=> {
        showNotice();
    });
    buyer.addEventListener('click', () => {
        if(!seller.checked){
            sellerNotice.style.display = 'none';    
        }
    });
</script>
@endsection