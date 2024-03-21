@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')

    <div class="bg-gray-100 flex justify-center items-center h-full md:h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="{{ asset('storage/images/image1.jpg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>
        <!-- Right: Reset Password Form -->
        <div class="lg:p-36 md:p-52 sm:p-20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4">Reset Password</h1>

            <p class="mb-4 block text-gray-600">Email Address</p>
            <p class="bg-white text-black py-2 px-3 border border-gray-300 rounded-md mb-4 cursor-not-allowed ">{{ $email }}</p>


            <form action="{{ route('reset_pw') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-800" placeholder="Password" required>
                    @error('password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-600">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-800" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @if(session('success'))
                    <div class="text-green-500 mb-4">{{ session('success') }}</div>
                @endif

                <button type="submit" class="bg-red-800 hover:bg-red-600 text-white font-semibold rounded-md py-2 px-4 w-full">Confirm Password</button>
            </form>

            <div class="mt-6 text-blue-900 text-center">
                <a href="{{ route('login') }}" class="hover:underline text-sm">Remember your password? Login here</a>
            </div>
        </div>
    </div>
@endsection
