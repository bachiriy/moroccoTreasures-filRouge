<nav class="bg-white shadow-lg border-b border-red-800">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('storage/images/logo.png') }}" class="h-8 rounded-full" alt="Moroccan Heritage Marketplace Logo" />
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
                <button class="mx-4 middle none center flex items-center justify-center rounded-lg p-3 font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-dark="true" data-popover-target="notifications-menu">
                    <i class="fas fa-bell text-lg leading-none"></i>
                </button>
                <ul role="menu" data-popover="notifications-menu" data-popover-placement="bottom" style="z-index: 1000" class="absolute flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md border border-blue-gray-50 bg-white p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
                    @foreach(\Illuminate\Support\Facades\Auth::user()->notifications as $notification)
                        <button role="menuitem" class="flex w-full cursor-pointer select-none items-center gap-4 rounded-md px-3 py-2 pr-8 pl-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <div class="flex flex-col gap-1">
                                <p class="block font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                                    <span class="font-bold text-blue-gray-900">{{ $notification->title . ' ' . Auth::user()->name }},</span>
                                    {{ $notification->description }}
                                </p>
                                <p class="flex items-center gap-1 font-sans text-xs font-light text-gray-600 antialiased">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-3 w-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $notification->created_at->diff(now())->h > 0 ? $notification->created_at->diff(now())->format('%h h') : $notification->created_at->diff(now())->format('%i min') }}
                                </p>
                            </div>
                        </button>
                    @endforeach
                </ul>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->avatar === null ? asset('storage/images/default_avatar.png') : asset('storage/'. Auth::user()->avatar) }}" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow border border-gray-400" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 ">{{ auth()->user()->name }}</span>
                        <span class="block text-sm  text-gray-500 truncate ">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        @if(Auth::user()->role === 'Admin')
                        <li>
                            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Dashboard</a>
                        </li>
                        @endif
                        <li>
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Earnings</a>
                        </li>
                        <li>
                            <a href="/products/create" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                Create Product
                            </a>
                        </li>

                        <li>
                            <form action="/logout" method="POST" class="">
                                @csrf
                                <button type="submit" class="flex self-start w-full px-4 py-2 text-sm text-red-700 hover:bg-gray-100 ">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="text-sm mx-2 border border-red-800 text-red-800 p-2 rounded-lg hover:shadow-lg transition-all hover:text-red-400">Login</a>
                <a href="/register" class="hidden md:block text-sm mx-2 bg-red-800 rounded-lg p-2 hover:bg-red-600 text-white transition-all shadow-lg">Register</a>
            @endauth

            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="/" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 {{ $page === 'Home' ? 'text-white bg-red-800 md:text-red-800 md:bg-transparent hover:bg-red-500 md:underline' : '' }} " aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/about" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0  {{ $page === 'About' ? 'text-white bg-red-800 md:text-red-800 md:bg-transparent hover:bg-red-500 md:underline' : '' }} ">About</a>
                </li>
                <li>
                    <a href="/shop" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 {{ $page === 'Shop' ? 'text-white bg-red-800 md:text-red-800 md:bg-transparent hover:bg-red-500 md:underline' : '' }} ">Shop</a>
                </li>
                <li>
                    <a href="/contact" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 {{ $page === 'Contact' ? 'text-white bg-red-800 md:text-red-800 md:bg-transparent hover:bg-red-500 md:underline' : '' }} ">Contact</a>
                </li>
                @auth
                <li>
                    <a href="/products" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 {{ $page === 'My Products' ? 'text-white bg-red-800 md:text-red-800 md:bg-transparent hover:bg-red-500 md:underline' : '' }} ">My Products</a>
                </li>
                <li>
                    <a href="/profile" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 {{ $page === 'Profile' ? 'text-white bg-red-800 md:text-red-800 md:bg-transparent hover:bg-red-500 md:underline' : '' }} ">My Profile</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


{{-- notification links --}}
<script type="module" src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"></script>
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>

