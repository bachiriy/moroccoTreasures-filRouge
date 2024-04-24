@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')

    <div class="flex flex-col h-screen bg-gradient-to-r from-gray-900 to-red-950">
        @if(session('warn'))
            <p class="msg bg-white z-50 text-yellow-600 absolute m-5 p-2 border border-yellow-600">Warning : {{ session('warn') }} </p>
        @endif
        <script>
            let msgs = document.querySelectorAll('.msg')
            window.onload = function () {
                setInterval(() => {
                    msgs.forEach((elm) => {
                        elm.innerHTML = '';
                        elm.style.border = 'none';
                    });
                }, 5000);
            };
        </script>

        <h1 class="text-xl text-center font-bold mt-10 text-gray-300">Catalog of Your Ordered Products</h1>
        <p class="text-gray-500 text-xs text-center mt-4 pb-6 border-b border-gray-300">Essential Step: Prioritize Direct Communication with Buyers to Confirm Orders, Ensuring Prompt Shipping and Customer Satisfaction.</p>
        <div class="sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="">
                    <table class="min-w-full">
                        <thead class="bg-white border-b bg-gradient-to-r from-gray-700 to-red-600">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                User
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Product
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                City
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Address
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Phone Number
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Price
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Handle
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class=" border-b bg-gray-500/15">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">
                                    {{ $order->id }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <p class="relative group text-gray-200">
                                        {{ $order->full_name }}
                                        <span class="absolute top-full left-0 w-64 rounded-lg bg-gray-800 text-white px-4 py-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <span class="underline">email</span> :  {{ $order->email }}
                                        </span>
                                    </p>
                                </td>
                                <td class="text-sm text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                    <p class="relative group">
                                        {{ $order->product->name }}
                                        <span class="absolute top-full left-0 w-64 rounded-lg bg-gray-800 text-white px-4 py-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <span class="underline"> description </span> : {{ $order->product->description }} <br>
                                            <span class="underline">category</span> : {{ \App\Models\Category::find($order->product->category_id)->name }} <br>
                                            <span class="underline">media</span> :
                                            <span class="flex">
                                                @foreach($order->product->media as $item)
                                                    <img src="{{ asset('storage/'. $item->name) }}" class="h-8 mx-1 my-3 flex rounded-sm">
                                                @endforeach
                                            </span>
                                        </span>
                                    </p>
                                </td>
                                <td class="text-sm text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $order->city }}
                                </td>
                                <td class="text-sm text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $order->address }}
                                </td>
                                <td class="text-sm text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $order->phone_number }}
                                </td>
                                <td class="text-sm text-green-500 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $order->product->price }} MAD
                                </td>
                                <td class="text-sm text-blue-600 flex justify-center font-light px-6 py-4 whitespace-nowrap">
                                    <a class="hover:underline" href="tel:{{ $order->phone_number }}">Call Buyer</a>
                                    <form action="/orders/{{ $order->id }}" method="post" class="w-fit">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 mx-2 hover:underline" onclick="confirm('Are you sure you want to delete this user ?')">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('Layouts.footer')
@endsection
