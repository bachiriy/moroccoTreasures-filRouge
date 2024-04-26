@extends('Layouts.app')

@section('content')
@include('Layouts.navbar')

<div class="overflow-hidden bg-gradient-to-b from-gray-900 to-black">
    <div class="w-screen h-screen overflow-hidden relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:left-0 before:z-10 before:opacity-30">
        <img src="{{ asset('storage/images/image3.webp') }}" class="absolute top-0 left-0 min-h-full ob" alt="">
        <div class="relative z-20 max-w-screen-lg mx-auto grid grid-cols-12 h-full items-center">
            <div class="col-span-6">
                <span class="uppercase text-white text-xs font-bold mb-2 block">WELCOME TO MOROCCAN HERITAGE MARKETPLACE</span>
                <h1 class="text-white font-extrabold text-5xl mb-8">Discover Authentic Moroccan Tools and Accessories</h1>
                <p class="text-stone-100 text-base">
                    Explore a curated collection of traditional Moroccan tools and accessories, celebrating the rich cultural heritage of Morocco. Shop now for unique products and immerse yourself in Moroccan craftsmanship.
                </p>
                @auth
                <a href="/shop">
                    <button href="/shop" class="mt-8 text-white bg-red-800 bg-opacity-50 transition-all uppercase py-4 text-base font-light px-10 border border-white hover:bg-white hover:bg-opacity-10">
                        Get started
                    </button>
                </a>
                @else
                <a href="/login">
                    <button href="/login" class="mt-8 text-white bg-red-800 bg-opacity-50 transition-all uppercase py-4 text-base font-light px-10 border border-white hover:bg-white hover:bg-opacity-10">
                        Get started
                    </button>
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<div class="bg-gradient-to-r from-red-900 to-red-600 py-20">
    <div class="max-w-screen-lg mx-auto flex justify-between items-center">
        <div class="max-w-xl text-white">
            <h2 class="font-black text-red-950 text-3xl mb-4">Le Maroc : une terre d'artisanat authentique et design !</h2>
            <p class="text-base text-sky-950">
                La richesse culturelle du Maroc passe aussi par son artisanat traditionnel qui, depuis quelques années déjà, existe aussi en version plus design. Divers et multiples matériaux sont finement travaillés à la main avec des machines et des outils restés largement traditionnels, pour en faire des objets décoratifs et usuels. Art de table, ameublement, bijoux et habillement, vous serez certainement tentés d'emporter avec vous quelques souvenirs marocains !
            </p>
        </div>
        <a href="/shop" class="text-sky-950 uppercase py-3 text-base px-10 border border-sky-950 hover:bg-sky-950 hover:bg-opacity-10">Shop Now</a>
    </div>
</div>

<!-- content section -->

<div class="py-12 relative overflow-hidden bg-white">
    <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
        <div class="w-full flex flex-col items-end pr-16">
            <h2 class="text-red-900 font-bold text-2xl max-w-xs text-right mb-12 mt-10">{{ $content[0]->name }}</h2>
            <div class="h-full mt-auto overflow-hidden relative">
                <img src="{{ asset('storage/'. $content[0]->product->media[0]->name) }}" class="h-full w-full object-contain" alt="">
            </div>
        </div>

        <div class="py-20 bg-gradient-to-r from-red-950 to-red-900 relative before:absolute before:h-full w-screen before:top-0 before:left-0">
            <div class="relative z-20 pl-12">
                <h2 class="text-[#f7d0b6] font-black text-5xl leading-snug mb-10">{{ $content[0]->product->name }}</h2>
                <p class="text-white text-sm">
                    {{ $content[0]->description }}
                </p>
                <a href="/shop">
                    <button class="mt-8 text-white uppercase py-3 text-sm px-10 border border-white hover:bg-white hover:bg-opacity-10">
                        View Shop
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="py-12 relative overflow-hidden bg-gradient-to-r from-blue-950 to-red-900">
    <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
        <div class="w-full flex flex-col items-end pr-16">
            <h2 class="text-[#64618C] font-bold text-2xl max-w-xs text-right mb-12 mt-10">{{ $content[2]->name }}</h2>
            <div class="h-full mt-auto overflow-hidden relative">
                <img src="{{ asset('storage/'. $content[2]->product->media[0]->name) }}" class="h-full w-full object-contain" alt="">
            </div>
        </div>

        <div class="py-20  relative ">
            <div class="relative z-20 pl-12">
                <h2 class="text-[#f7d0b6] font-black text-5xl leading-snug mb-10">{{ $content[2]->product->name }}</h2>
                <p class="text-white text-sm">
                    {{ $content[2]->product->description }}
                </p>
                <a href="/shop">
                    <button class="mt-8 text-white uppercase py-3 text-sm px-10 border border-white hover:bg-white hover:bg-opacity-10">View Shop</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="py-4 relative overflow-hidden bg-white">
    <div class="grid grid-cols-2 max-w-screen-lg mx-auto ">
        <div class="py-20 relative before:absolute before:h-full before:w-screen  before:top-0 before:right-0">
            <div class="relative z-20 pl-12">
                <h2 class="text-sky-950 font-black text-5xl leading-snug mb-10">{{ $content[1]->product->name }}</h2>
                <p class="text-sky-950 text-sm">
                    {{ $content[1]->product->description }}
                </p>
                <a href="/shop">
                    <button class="mt-8 text-sky-950 uppercase py-3 text-sm px-10 border border-sky-950 hover:bg-white hover:bg-opacity-10">View Shop</button>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col pl-16">
            <h2 class="text-[#64618C] font-bold text-2xl max-w-xs text-left mb-12 mt-10">{{ $content[1]->name }}</h2>
            <div class="h-full mt-auto overflow-hidden relative">
                <img src="{{ asset('storage/'. $content[1]->product->media[0]->name) }}" class="h-full w-full object-contain" alt="">
            </div>
        </div>

    </div>
</div>

<div class="py-4 relative overflow-hidden bg-gradient-to-r from-red-950 to-yellow-900">
    <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
        <div class="py-20  relative ">
            <div class="relative z-20 pl-12">
                <h2 class="text-gray-300 font-black text-5xl leading-snug mb-10">{{ $content[3]->product->name }}</h2>
                <p class="text-gray-300 text-sm">
                    {{ $content[3]->product->description }}
                </p>
                <a href="/shop">
                    <button class="mt-8 text-gray-300 uppercase py-3 text-sm px-10 border border-gray-300 hover:bg-white hover:bg-opacity-10">View Shop</button>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col pl-16">
            <h2 class="text-gray-400 font-bold text-2xl max-w-xs text-left mb-12 mt-10">{{ $content[3]->name }}</h2>
            <div class="h-full mt-auto overflow-hidden relative">
                <img src="{{ asset('storage/'. $content[3]->product->media[0]->name) }}" class="h-full w-full object-contain" alt="">
            </div>
        </div>

    </div>
</div>
<!-- end content section -->


<!-- about section -->
<div class="py-16 bg-gradient-to-b from-gray-900 to-gray-800 text-white" id="about">
    <div class="container m-auto px-6 md:px-12 xl:px-6">
        <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
            <div class="md:5/12 lg:w-5/12">
                <img src="{{ asset('storage/images/image1.jpg') }}" alt="image" loading="lazy" width="" height="">
            </div>
            <div class="md:7/12 lg:w-6/12">
                <h2 class="text-2xl font-bold md:text-4xl">Nuxt development is carried out by passionate developers</h2>
                <p class="mt-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum omnis voluptatem accusantium nemo perspiciatis delectus atque autem! Voluptatum tenetur beatae unde aperiam, repellat expedita consequatur! Officiis id consequatur atque doloremque!</p>
                <p class="mt-4"> Nobis minus voluptatibus pariatur dignissimos libero quaerat iure expedita at? Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia.</p>
            </div>
        </div>
    </div>
</div>
<!-- end about section  -->

<!-- contact section -->
<!-- component -->
<div id="contact" class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                    <h1 class="text-4xl sm:text-5xl text-gray-800 dark:text-white font-extrabold tracking-tight">
                        Get in touch
                    </h1>
                    <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                        Fill in the form to start a conversation
                    </p>

                    <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                            N 148 Ridad Zitoune C, 5000, Meknes, Morocco
                        </div>
                    </div>

                    <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                            +212 649291651
                        </div>
                    </div>

                    <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div class="ml-4 text-md tracking-wide font-semibold w-40">
                            med.el.bachiri@gmail.com
                        </div>
                    </div>
                </div>

                <form id="contact_form" class="p-6 flex flex-col justify-center" method="post" action="/contact">

                    <div class="flex flex-col">
                        <p class="success text-green-500">{{ session('success') }}</p>
                        <input type="name" name="name" id="name" placeholder="Full Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-white font-semibold focus:border-red-500 focus:outline-none">
                        <p class="errors text-red-600 text-xs"></p>
                    </div>

                    <div class="flex flex-col mt-2">
                        <input type="email" name="email" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-white font-semibold focus:border-red-500 focus:outline-none">
                        <p class="errors text-red-600 text-xs"></p>
                    </div>

                    <div class="flex flex-col mt-2">
                        <input type="tel" name="phone" placeholder="Telephone Number" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-white font-semibold focus:border-red-500 focus:outline-none">
                        <p class="errors text-red-600 text-xs"></p>
                    </div>

                    <div class="flex flex-col mt-2">
                        <textarea type="tel" name="message" placeholder="Message goes here..." class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-white font-semibold focus:border-red-500 focus:outline-none"></textarea>
                        <p class="errors text-red-600 text-xs"></p>
                    </div>

                    <input id="formSubmitButton" value="Submit" type="submit" name="button" class="md:w-32 bg-gradient-to-r from-red-950 to-red-600 hover:bg-blue-dark text-white font-bold py-3 px-6 rounded-lg mt-3 hover:opacity-80 transition ease-in-out duration-300" />
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let errors = document.querySelectorAll('.errors');
    let formButton = document.querySelector('#formSubmitButton');

    let form = document.getElementById('contact_form');


    let success = document.querySelector('.success');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        formButton.value = 'Loading...';

        success.innerHTML = '';
        [...errors].map(i => i.innerHTML = ''); // [...errors] changes the errors nodelist to array


        let formData = new FormData(this);


        formData.entries().forea
        fetch('/api/contact', {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                method: 'POST',
                body: JSON.stringify({
                    name: formData.get('name'),
                    email: formData.get('email'),
                    phone: formData.get('phone'),
                    message: formData.get('message'),
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    if (data.errors.name) {
                        errors[0].innerHTML = data.errors.name[0];
                    } else if (data.errors.email) {
                        errors[1].innerHTML = data.errors.email[0];
                    } else if (data.errors.phone) {
                        errors[2].innerHTML = data.errors.phone[0];
                    } else if (data.errors.message) {
                        errors[3].innerHTML = data.errors.message[0];
                    }
                } else if (data.success) {
                    form.reset(); 
                    success.innerHTML = data.success;
                }
            })
            .catch(error => console.log(error))
            .finally(() => formButton.value = 'Submit')
    });
</script>


<!-- end contact section  -->
@include('Layouts.footer')
@endsection