@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')
    <div class="bg-gray-100 flex justify-center items-center h-screen">
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-bold mb-4">Forgot Password?</h1>
            <p class="text-sm text-gray-600 mb-4">Remember your password? <a href="{{ route('login') }}" class="text-blue-900 hover:underline font-medium">Login here</a></p>
            @if(session('success'))
                <div class="text-green-600 mb-4">{{ session('success') }}</div>
            @endif
            <form action="/forgot-password" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required aria-describedby="email-error">
                    @error('email')
                    <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-red-800 hover:bg-red-600 text-white font-semibold rounded-md py-2 px-4 w-full">Reset Password</button>
            </form>
        </div>
    </div>
@endsection
