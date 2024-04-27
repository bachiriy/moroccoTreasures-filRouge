<footer aria-labelledby="footer-heading" class="border-t border-gray-200 bg-gray-900 text-gray-500">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-8 py-20 sm:grid-cols-2 sm:gap-y-0 lg:grid-cols-4">
            <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-x-8 lg:gap-y-0">
                <div>
                    <h3 class="text-sm font-medium text-red-400">Account</h3>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="text-sm">
                            <a href="/profile" class="text-red-400 hover:text-red-600">My Profile</a>
                        </li>
                        <li class="text-sm">
                            <a href="/cart" class="text-red-400 hover:text-red-600">Cart</a>
                        </li>
                        <li class="text-sm">
                            <a href="/checkout" class="text-red-400 hover:text-red-600">Checkout</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-red-400">Service</h3>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="text-sm">
                            <a href="/shop" class="text-red-400 hover:text-red-600">Shop</a>
                        </li>
                        <li class="text-sm">
                            <a href="/#about" class="text-red-400 hover:text-red-600">About</a>
                        </li>
                        <li class="text-sm">
                            <a href="/#contact" class="text-red-400 hover:text-red-600">Get in touch</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-x-8 lg:gap-y-0">
                <div>
                    <h3 class="text-sm font-medium text-red-400">Recent Categories</h3>
                    <ul role="list" class="mt-6 space-y-6">
                        @foreach(App\Models\Category::with('products')->get()->take(3) as $category)
                        <li class="text-sm">
                            <a href="/products/{{ $category->products[0]->id }}" class="text-red-400 hover:text-red-600">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-red-400">Connect</h3>
                    <ul role="list" class="mt-6 space-y-6">
                        <li class="text-sm">
                            <a href="https://www.linkedin.com/in/mohammed-el-bachiri-21016b253/" target="_blank" class="text-red-400 hover:text-red-600">Linkedin</a>
                        </li>
                        <li class="text-sm">
                            <a href="https://github.com/mohammed-el-bachiri/" target="_blank" class="text-red-400 hover:text-red-600">GitHub</a>
                        </li>
                        <li class="text-sm">
                            <a href="mailto:med.el.bachiri.00@gmail.com" target="_blank" class="text-red-400 hover:text-red-600">Email</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100 py-10 sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center justify-center text-sm text-red-400">
                <p class="ml-3 pl-3">English</p>
            </div>
            <p class="mt-6 text-center text-sm text-red-400 sm:mt-0">&copy; 2021 Moroccan Heritage Marketplace.</p>
        </div>
    </div>
</footer>
