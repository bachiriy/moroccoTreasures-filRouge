@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')
    <div class="overflow-hidden">
        <div class="w-screen h-screen overflow-hidden relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:left-0 before:z-10 before:opacity-30">
            <img src="{{ asset('storage/images/image3.webp') }}" class="absolute top-0 left-0 min-h-full ob" alt="">
            <div class="relative z-20 max-w-screen-lg mx-auto grid grid-cols-12 h-full items-center">
                <div class="col-span-6">
                    <span class="uppercase text-white text-xs font-bold mb-2 block">WELCOME TO MOROCCAN HERITAGE MARKETPLACE</span>
                    <h1 class="text-white font-extrabold text-5xl mb-8">Discover Authentic Moroccan Tools and Accessories</h1>
                    <p class="text-stone-100 text-base">
                        Explore a curated collection of traditional Moroccan tools and accessories, celebrating the rich cultural heritage of Morocco. Shop now for unique products and immerse yourself in Moroccan craftsmanship.
                    </p>
                    <button class="mt-8 text-white bg-red-800 bg-opacity-50 transition-all uppercase py-4 text-base font-light px-10 border border-white hover:bg-white hover:bg-opacity-10">Get started</button>
                </div>
            </div>
        </div>
        <div class="bg-red-200 py-20">
            <div class="max-w-screen-lg mx-auto flex justify-between items-center">
                <div class="max-w-xl">
                    <h2 class="font-black text-red-950 text-3xl mb-4">Le Maroc : une terre d'artisanat authentique et design !</h2>
                    <p class="text-base text-sky-950">
                        La richesse culturelle du Maroc passe aussi par son artisanat traditionnel qui, depuis quelques années déjà, existe aussi en version plus design. Divers et multiples matériaux sont finement travaillés à la main avec des machines et des outils restés largement traditionnels, pour en faire des objets décoratifs et usuels. Art de table, ameublement, bijoux et habillement, vous serez certainement tentés d'emporter avec vous quelques souvenirs marocains !

                        Le Maroc est également un pays d'artisanat. À Safi, Fès ou Zagora, vous découvrez le travail de l'argile. A Ouarzazate, ce sont les tapis qui sont à l'honneur. Marrakech n'est pas en reste : ici, entre autres activités, l'on confectionne des cuirs. Les tanneurs fabriquent babouches, sacs et articles de salon. Un ensemble de créations au goût sûr qui, aux charmes de la tradition, mêlent les plus audacieuses innovations esthétiques.                </p>
                </div>
                <a href="/shop" class="text-sky-950 uppercase py-3 text-base px-10 border border-sky-950 hover:bg-sky-950 hover:bg-opacity-10">Shop Now</a>
            </div>
        </div>
        <div class="py-12 relative overflow-hidden bg-white">
            <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
                <div class="w-full flex flex-col items-end pr-16">
                    <div class="h-full mt-auto overflow-hidden relative">
                        <img src="{{ asset('storage/images/les-tapis-marocains.jpg') }}" class="h-full w-full object-contain" alt="">
                    </div>
                </div>

                <div class="py-20 bg-slate-100 relative before:absolute before:h-full before:w-screen before:bg-[#f7d0b6] before:top-0 before:left-0">
                    <div class="relative z-20 pl-12">
                        <h2 class="text-sky-400 font-black text-5xl leading-snug mb-10">Les tapis marocains</h2>
                        <p class="text-white text-sm">
                            Dans les régions de Rabat, Fès et Tétouan, une panoplie de produits d’artisanat marocain s’offrent à vous dont les tapis qui sont à l'honneur dans les médinas. Des motifs originaux et complexes, tantôt en centre tantôt aux bords selon les usages, qui suscitent une grande réflexion portant sur leurs conceptions. Au Maroc, la valeur d’un tapis est étroitement liée aux nombres de nœuds et des dessins qui le composent, encore faut-il distinguer le tapis citadin du rural !                    </p>
                        <button class="mt-8 text-sky-400 uppercase py-3 text-sm px-10 border border-sky-400 hover:bg-sky-400 hover:bg-opacity-10">
                            Explore
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4 relative overflow-hidden bg-white">
            <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
                <div class="py-20 bg-slate-100 relative before:absolute before:h-full before:w-screen before:bg-gray-100 before:top-0 before:right-0">
                    <div class="relative z-20 pl-12">
                        <h2 class="text-sky-950 font-black text-5xl leading-snug mb-10">Les habits traditionnels</h2>
                        <p class="text-sky-950 text-sm">
                            Les habits traditionnels, encore de mise lors des fêtes et cérémonies, adoptent aujourd'hui un style novateur. Essayez sans attendre le fameux caftan ! Les babouches sont également un symbole de l'habillement marocain typique. Cette mode se décline aujourd'hui sous toutes les coutures et de nombreux créateurs proposent des modèles particulièrement design et contemporains !                    </p>
                        <button class="mt-8 text-sky-950 uppercase py-3 text-sm px-10 border border-sky-950 hover:bg-white hover:bg-opacity-10">Explore</button>
                    </div>
                </div>
                <div class="w-full flex flex-col pl-16">
                    <div class="h-full mt-auto overflow-hidden relative">
                        <img src="{{ asset('storage/images/caftan.jpg') }}" class="h-full w-full object-contain" alt="">
                    </div>
                </div>

            </div>
        </div>

        <div class="py-12 relative overflow-hidden bg-white">
            <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
                <div class="w-full flex flex-col items-end pr-16">
                    <div class="h-full mt-auto overflow-hidden relative">
                        <img src="{{asset('storage/images/les-bijoux.jpg')}}" class="h-full w-full object-contain" alt="">
                    </div>
                </div>

                <div class="py-20 bg-slate-100 relative before:absolute before:h-full before:w-screen before:bg-purple-400 before:top-0 before:left-0">
                    <div class="relative z-20 pl-12">
                        <h2 class="text-[#f7d0b6] font-black text-5xl leading-snug mb-10">Les bijoux</h2>
                        <p class="text-white text-sm">
                            Vous voulez rentrer chez vous avec des bijoux originaux faits main ? Marrakech et ses environs regorgent de bijoux traditionnels somptueux ! Vous les trouverez entre autres, dans la médina attenante à la place Jemaa El Fna. De nombreux bijoux en argent sont également produits dans des villes telles que Goulimine, Agadir, Essaouira, Tiznit ou encore Taroudant. En or ou en argent, ils sont réalisés par des artisans et vendus aux souks des anciennes médinas.                    </p>
                        <button class="mt-8 text-white uppercase py-3 text-sm px-10 border border-white hover:bg-white hover:bg-opacity-10">Explore.</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-4 relative overflow-hidden bg-white">
            <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
                <div class="py-20 bg-slate-100 relative before:absolute before:h-full before:w-screen before:bg-gray-100 before:top-0 before:right-0">
                    <div class="relative z-20 pl-12">
                        <h2 class="text-sky-950 font-black text-5xl leading-snug mb-10">Le fer forgé</h2>
                        <p class="text-sky-950 text-sm">
                            À Marrakech, Fès ou Safi, vous pourrez découvrir des icônes du travail du fer forgé marocain: chandeliers, lanternes, miroirs ou encore abats jours s’intégreront parfaitement dans vos intérieurs. De magnifiques objets tressés en osier et raphia et palmier vous attendent à Fès, Marrakech ou encore Salé.
                            <button class="mt-8 text-sky-950 uppercase py-3 text-sm px-10 border border-sky-950 hover:bg-white hover:bg-opacity-10">Explore</button>
                    </div>
                </div>
                <div class="w-full flex flex-col pl-16">
                    <div class="h-full mt-auto overflow-hidden relative">
                        <img src="{{ asset('storage/images/le-fer-forge.jpg') }}" class="h-full w-full object-contain" alt="">
                    </div>
                </div>

            </div>
        </div>

        <div class="py-12 relative overflow-hidden bg-white">
            <div class="grid grid-cols-2 max-w-screen-lg mx-auto">
                <div class="w-full flex flex-col items-end pr-16">
                    <div class="h-full mt-auto overflow-hidden relative">
                        <img src="{{asset('storage/images/la-ceramique-et-la-poterie.jpg')}}" class="h-full w-full object-contain" alt="">
                    </div>
                </div>

                <div class="py-20 bg-slate-100 relative before:absolute before:h-full before:w-screen before:bg-purple-400 before:top-0 before:left-0">
                    <div class="relative z-20 pl-12">
                        <h2 class="text-[#f7d0b6] font-black text-5xl leading-snug mb-10">La céramique et la poterie</h2>
                        <p class="text-white text-sm">
                            À Rabat, les poteries illustrent l'entremêlement de la culture Amazigh et andalou. La céramique marque aussi sa présence. Les formes et les couleurs utilisées varient selon les régions : les motifs bleus à Fès, les jaunes à Safi et les verts à Meknès. Rendez-vous à Safi pour découvrir des poteries uniques en leur genre, multicolores. À Azemmour, les femmes artisanes ont leur propre structure. À Salé, ne manquez pas de visiter le complexe des potiers, l'Oulja
                            <button class="mt-8 text-white uppercase py-3 text-sm px-10 border border-white hover:bg-white hover:bg-opacity-10">Explore</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layouts.footer')
@endsection
