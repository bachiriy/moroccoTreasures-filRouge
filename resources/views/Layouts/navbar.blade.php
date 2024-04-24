<nav class="bg-gradient-to-r from-gray-900 to-red-950 shadow-lg border-b border-red-800 p-2">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('storage/images/logo.png') }}" class="h-12 rounded-full" alt="Moroccan Heritage Marketplace Logo" />
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
            <a href="/cart" class="relative scale-75 mx-4 hover:text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                @if(\App\Models\Cart::where('user_id', Auth::id())->get()->count() > 0)
                <span class="absolute -top-2 left-4 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50">{{ \App\Models\Cart::where('user_id', Auth::id())->get()->count() }}</span>
                @endif
            </a>

            <button class="mx-4 middle none center flex items-center justify-center rounded-lg p-3 font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none " data-ripple-dark="true" data-popover-target="notifications-menu">
                <i class="fas fa-bell text-lg leading-none"></i>
            </button>
            @if(App\Models\Notification::where('user_id', Auth::id())->count() > 0)
            <ul role="menu" data-popover="notifications-menu" data-popover-placement="bottom" style="z-index: 1000" class="absolute flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md bg-gradient-to-r from-gray-900 to-red-950  p-3 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
                    @foreach(\Illuminate\Support\Facades\Auth::user()->notifications()->orderBy('created_at', 'desc')->get() as $notification)
                    <button role=" menuitem" class="flex w-full cursor-pointer select-none items-center gap-4 rounded-md px-3 py-2 pr-8 pl-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                <div class="flex flex-col gap-1">
                    <p class="block font-sans text-sm font-normal leading-normal text-gray-200 antialiased">
                        <span class="font-bold text-blue-gray-900">{{ $notification->title}},</span>
                        {{ $notification->description }}
                    </p>
                    <p class="flex items-center gap-1 font-sans text-xs font-light text-gray-400 antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-3 w-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $notification->created_at->diff(now())->h > 0 ? $notification->created_at->diff(now())->format('%h h') : $notification->created_at->diff(now())->format('%i min') }}
                    </p>
                </div>
                </button>
                @endforeach
                <form action="/notifications" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-900 border border-red-500/25 px-2 py-1 rounded-lg hover:bg-red-800 hover:text-gray-300 transition-all">
                        Clear All
                    </button>
                </form>
            </ul>
            @else
            <ul role="menu" data-popover="notifications-menu" data-popover-placement="bottom" style="z-index: 1000" class="absolute flex min-w-[180px] flex-col gap-2 overflow-auto rounded-md bg-gradient-to-r from-gray-900 to-red-950  p-3 font-sans text-sm font-normal text-gray-300 shadow-lg shadow-blue-gray-500/10 focus:outline-none" >
                <p>no notifications.</p>
            </ul>
            @endif
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-2 focus:ring-gray-800" style="margin-left: 10px" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full shadow-lg hover:opacity-80" src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-gradient-to-r from-gray-900 to-red-950 divide-y divide-red-950 rounded-lg shadow-lg" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-300 font-bold ">{{ auth()->user()->name }}</span>
                    <span class="block text-sm  text-gray-500 truncate ">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    @if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Super_Admin')
                    <li>
                        <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-400 hover:text-red-800 ">Dashboard</a>
                    </li>
                    @endif
                    <li>
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-400 hover:text-red-800">Profile</a>
                    </li>
                    @if(in_array(Auth::user()->role, ['Admin', 'Super_Admin', 'Seller']))
                    <li>
                        <a href="/products" class="block px-4 py-2 text-sm text-gray-400 hover:text-red-800">My Products</a>
                    </li>
                    <li>
                        <a href="/products/create" class="block px-4 py-2 text-sm text-gray-400 hover:text-red-800">
                            Create Product
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="/shop" class="block px-4 py-2 text-sm text-gray-400 hover:text-red-800">See Shop</a>
                    </li>

                    <li>
                        <form action="/logout" method="POST" class="">
                            @csrf
                            <button type="submit" class="flex self-start w-full px-4 py-2 text-sm text-red-700 hover:bg-gradient-to-r transition-all transform duration-100 hover:text-gray-400 hover:from-red-900 hover:to-red-950  ">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a href="/login" class="text-sm mx-2 shadow-lg border border-red-800 text-red-800 p-2 rounded-lg hover:shadow-lg transition-all hover:text-red-400">Login</a>
            <a href="/register" class="hidden md:block opacity-80 text-sm mx-2 bg-red-800 rounded-lg p-2 hover:bg-red-600 text-white transition-all shadow-lg">Register</a>
            @endauth

            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 opacity-80">
                <li>
                    <a href="/" class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-800 md:hover:bg-transparent md:hover:text-red-400 md:p-0 {{ $page === 'Home' ? 'text-red-400 hover:bg-gray-800 md:text-red-400 md:bg-transparent hover:bg-red-500 ' : '' }} " aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/#about" class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-800 md:hover:bg-transparent md:hover:text-red-400 md:p-0  {{ $page === 'About' ? 'text-red-400 hover:bg-gray-800 md:text-red-400 md:bg-transparent hover:bg-red-500 ' : '' }} ">About</a>
                </li>
                <li>
                    <a href="/shop" class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-800 md:hover:bg-transparent md:hover:text-red-400 md:p-0 {{ $page === 'Shop' ? 'text-red-400 hover:bg-gray-800 md:text-red-400 md:bg-transparent hover:bg-red-500 ' : '' }} ">Shop</a>
                </li>

                @auth
                @if(in_array(Auth::user()->role, ['Super_Admin', 'Admin', 'Seller']))
                <li>
                    <a href="/products" class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-800 md:hover:bg-transparent md:hover:text-red-400 md:p-0 {{ $page === 'My Products' ? 'text-red-400 hover:bg-gray-800 md:text-red-400 md:bg-transparent hover:bg-red-500 ' : '' }} ">My Products</a>
                </li>
                @endif
                <li>
                    <a href="/profile" class="block py-2 px-3 text-gray-200 rounded hover:bg-gray-800 md:hover:bg-transparent md:hover:text-red-400 md:p-0 {{ $page === 'Profile' ? 'text-red-400 hover:bg-gray-800 md:text-red-400 md:bg-transparent hover:bg-red-500 ' : '' }} ">My Profile</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


{{-- notification links --}}
<script type="module" src="https://unpkg.com/@material-tailwind/html@latest/scripts/popover.js"></script>
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />