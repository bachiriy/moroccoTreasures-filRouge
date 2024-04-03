@extends('Layouts.app')
@section('content')
    @include('Layouts.navbar')
    <div class="bg-gray-100 flex justify-center items-center h-full md:h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="{{ asset('storage/images/image1.jpg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4">Login</h1>
            @if(session('status'))
                <div class="text-xs text-green-600 mb-4">{{ session('status') }}</div>
            @endif
            @if (session('success'))
                <div class="text-green-500 mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-600">Username</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-800" placeholder="Email" value="{{ old('name') }}" autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-red-800" placeholder="Password" autocomplete="off">
                </div>
                <!-- Remember Me Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="text-red-800">
                    <label for="remember" class="text-gray-600 ml-2">Remember Me</label>
                </div>
                <!-- Forgot Password Link -->
                <div class="mb-6 text-blue-900">
                    <a href="{{ route('password.forgot') }}" class="hover:underline text-sm">Forgot Password?</a>
                </div>
                <!-- Login Button -->
                <button type="submit" class="bg-red-800 hover:bg-red-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
            </form>
            <!-- Sign up  Link -->
            <div class="mt-6 text-blue-900 text-center">
                <a href="{{ route('register') }}" class="hover:underline text-sm">Don't have an account yet? Sign up Here</a>
            </div>
        </div>
    </div>
@endsection
