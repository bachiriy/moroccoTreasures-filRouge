@extends('Layouts.app')
@section('content')
@include('Layouts.navbar')
<div class="bg-gradient-to-r from-gray-900 to-gray-950 w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
    <aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
        <div class="sticky flex flex-col gap-2 p-4 text-sm border-r border-indigo-100 text-white top-12">

            <h2 class="pl-3 mb-4 text-2xl font-semibold">Settings</h2>
            <button onclick="showDiv1(this)" class="sittings_btn flex items-center px-3 py-2.5 font-semibold text-white hover:opacity-70 border-red-700 border rounded-full">
                Account Settings
            </button>
            <button onclick="showDiv2(this)" class="sittings_btn flex items-center px-3 py-2.5 font-semibold text-white hover:opacity-70 ">
                Change Password
            </button>
        </div>
    </aside>
    <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">
        @if(session('success'))
        <p class="msg text-green-500 p-2 rounded-sm border border-green-600 text-center">{{ session('success') }}</p>
        @endif
        <div id="div-1" class="p-2 md:p-4">
            <form action="/user/general-update" method="post" enctype="multipart/form-data" class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                @csrf
                @method('PUT')
                <h2 class="pl-6 text-2xl font-bold sm:text-xl text-gray-200">Public Profile</h2>

                <div class="grid max-w-2xl mx-auto mt-8">
                    @error('avatar')
                    <p class="msg text-red-400">{{ $message }}</p>
                    @enderror
                    <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
                        <img id="avatarPreview" class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-red-800" src="{{ asset('storage/'. \Illuminate\Support\Facades\Auth::user()->avatar) }}" alt="Bordered avatar">
                        <div class="flex flex-col space-y-5 sm:ml-8">
                            <input type="file" name="avatar" id="avatarInput" class="hidden" accept="image/*" onchange="previewImage(event)">
                            <label for="avatarInput" class="py-3.5 px-7 text-base font-medium text-indigo-900 cursor-pointer focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                                Change Picture
                            </label>
                        </div>
                    </div>

                    <script>
                        function previewImage(event) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                const preview = document.getElementById('avatarPreview');
                                preview.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>


                    <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                        @error('name')
                        <p class="msg text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-500 ">Your
                                    full name </label>
                                <input type="text" name="name" id="name" class="bg-gradient-to-l from-gray-900 to-red-950 border border-indigo-300 text-gray-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 " placeholder="Your first name" value="{{ Auth::user()->name }}" required>
                            </div>

                        </div>

                        <div class="mb-2 sm:mb-6">
                            @error('email')
                            <p class="msg text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-500 ">Your
                                email</label>
                            <input type="email" id="email" name="email" class="bg-gradient-to-l from-gray-900 to-red-950 border border-indigo-300 text-gray-100 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 " placeholder="your.email@mail.com" value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="profession" class="block mb-2 text-sm font-medium text-gray-500 ">Role</label>
                            <p class="bg-gradient-to-l from-gray-900 to-red-950 border border-indigo-300 text-gray-100 font-bold text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                                cursor-not-allowed
                                ">
                                {{ Auth::user()->role }}
                            </p>

                        </div>



                        <div class="flex justify-end">
                            <button type="submit" class="text-white bg-red-950 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800">
                                Save
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div id="div-2" style="display: none;">
            <form action="/user/password-update" method="POST" class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                @csrf
                @method('PUT')

                <div class="grid max-w-2xl mx-auto mt-8">
                    <h1 class="font-bold text-xl text-gray-200">Changing Password</h1>
                    <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                        <!-- Old Password -->
                        <div class="w-full mb-2">
                            @error('old-password')
                            <p class="msg text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                            <label for="old-password" class="block mb-2 text-sm font-medium text-gray-400">Old password</label>
                            <input type="password" id="old-password" name="old-password" class="bg-gradient-to-l from-gray-900 to-red-950 text-gray-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Type your old password" required>
                        </div>

                        <!-- New Password -->
                        <div class="mb-2">
                            @error('new-password')
                            <p class="msg text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="new-password" class="block mb-2 text-sm font-medium text-gray-400">New Password</label>
                            <input type="password" id="new-password" name="new-password" class="bg-gradient-to-l from-gray-900 to-red-950 text-gray-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Type new password" required>
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mb-2">
                            @error('new-password_confirmation')
                            <p class="msg text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="new-password-confirmation" class="block mb-2 text-sm font-medium text-gray-400">Confirm Password</label>
                            <input type="password" id="new-password-confirmation" name="new-password_confirmation" class="bg-gradient-to-l from-gray-900 to-red-950 text-gray-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Retype the new password" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="text-white bg-red-950 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                                Save
                            </button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </main>
</div>

<script>
    let div1 = document.getElementById('div-1');
    let div2 = document.getElementById('div-2');

    let sittings_btns = document.querySelectorAll('.sittings_btn');

    function defaultStyle() {
        sittings_btns.forEach(element => {
            element.classList.remove('border-red-700', 'border', 'rounded-full');
        });
    }

    function showDiv2(self) {
        div1.style.display = 'none';
        div2.style.display = 'flex';
        defaultStyle();
        self.classList.add('border-red-700', 'border', 'rounded-full');
    }

    function showDiv1(self) {
        div1.style.display = 'flex';
        div2.style.display = 'none';
        defaultStyle();
        self.classList.add('border-red-700', 'border', 'rounded-full');
    }

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
@endsection