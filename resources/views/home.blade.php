@extends('layouts.web')

@section('main')
    <section id="hero" class="container px-4 lg:px-0 full-hero flex mx-auto flex-col md:flex-row justify-center">
        <div class="px-4 md:self-center h-1/2 md:w-1/2 md:order-2 pb-3 md:pb-0">
            <img class="w-full" src="/img/hero-belihand.png" alt="">
        </div>

        <div class="md:self-center h-1/2 md:w-1/2">
            <div class="text-center md:text-left">
                <h1 class="text-3xl tracking-tight font-extrabold text-beliyellow sm:text-5xl lg:text-6xl md:pb-3">
                    <span class="block xl:inline">Diseños únicos<br>pintados a mano</span>
                </h1>

                <p class="mt-3 text-base sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 lg:text-xl lg:mx-0">
                    Piezas decorativas para uso propio, para regalo o colección.
                </p>

                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center md:justify-start">
                    <div class="rounded-md">
                        <a 
                            href="{{ route('web.products') }}" 
                            class="w-full flex items-center justify-center py-3 px-4 uppercase tracking-wider border border-transparent text-base font-medium rounded-md text-white bg-belired hover:bg-black md:py-4 md:text-lg lg:text-xl md:px-10 transition ease-in-out hover:scale-110 duration-300"
                        >
                            ¡Quiero mi Belihand!
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    </section>

    <section class="categories grid sm:grid-cols-2 lg:grid-cols-4 text-center">
        <div class="bg-black px-3 py-6 lg:px-8 lg:py-16 flex flex-col justify-between">
            <div>
                <img src="/img/icons/lpf.svg" alt="Fútbol Argentino" class="w-12 lg:w-20 mb-5 mx-auto">
                <h3 class="text-2xl tracking-tight font-extrabold text-white pb-5 lg:text-4xl xl:text-5xl lg:pb-10">
                    <span class="block xl:inline">Fútbol Argentino</span>
                </h3>
            </div>
            <div class="rounded-md">
                <a href="{{ route('web.products', ['type' => 'futbol-argentino']) }}" class="inline-block px-4 py-3 uppercase tracking-wider border border-white text-base font-medium rounded-md text-white hover:text-black bg-transparent hover:bg-white md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Ver Más</a>
            </div>
        </div>
        <div class="bg-beliblue px-3 py-6 lg:px-8 lg:py-16 flex flex-col justify-between">
            <div>
                <img src="/img/icons/premier.svg" alt="Fútbol Inglés" class="w-12 lg:w-20 mb-5 mx-auto">
                <h3 class="text-2xl tracking-tight font-extrabold text-white pb-5 lg:text-4xl xl:text-5xl lg:pb-10">
                    <span class="block xl:inline">Fútbol Inglés</span>
                </h3>
            </div>
            <div class="rounded-md">
                <a href="{{ route('web.products', ['type' => 'futbol-ingles']) }}" class="inline-block px-4 py-3 uppercase tracking-wider border border-white text-base font-medium rounded-md text-white hover:text-beliblue bg-transparent hover:bg-white md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Ver Más</a>
            </div>
        </div>
        <div class="bg-belired px-3 py-6 lg:px-8 lg:py-16 flex flex-col justify-between">
            <div>
                <img src="/img/icons/world.svg" alt="Selecciones del Mundo" class="w-12 lg:w-20 mb-5 mx-auto">
                <h3 class="text-2xl tracking-tight font-extrabold text-white pb-5 lg:text-4xl xl:text-5xl lg:pb-10">
                    <span class="block xl:inline">Selecciones del Mundo</span>
                </h3>
            </div>
            <div class="rounded-md">
                <a href="{{ route('web.products', ['type' => 'selecciones-del-mundo']) }}" class="inline-block px-4 py-3 uppercase tracking-wider border border-white text-base font-medium rounded-md text-white hover:text-belired bg-transparent hover:bg-white md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Ver Más</a>
            </div>
        </div>
        <div class="bg-beliyellow px-3 py-6 lg:px-8 lg:py-16 flex flex-col justify-between">
            <div>
                <img src="/img/icons/characters.svg" alt="Fútbol Inglés" class="w-12 lg:w-20 mb-5 mx-auto">
                <h3 class="text-2xl tracking-tight font-extrabold text-white pb-5 lg:text-4xl xl:text-5xl lg:pb-10">
                    <span class="block xl:inline">Personajes Populares</span>
                </h3>
            </div>
            <div class="rounded-md">
                <a href="{{ route('web.products', ['type' => 'personajes-populares']) }}" class="inline-block px-4 py-3 uppercase tracking-wider border border-white text-base font-medium rounded-md text-white hover:text-beliyellow bg-transparent hover:bg-white md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Ver Más</a>
            </div>
        </div>
    </section>

    <section id="products" class="py-16 lg:py-24 bg-gray-100">
        <div class="container mx-auto px-4 lg:px-0 ">
            <div class="text-center text-4xl tracking-tight font-extrabold text-black sm:text-5xl lg:text-6xl pb-12 lg:pb-16">
                <span class="block xl:inline">Los más pedidos</span>
            </div>                

            <div class="relative mb-12 md:hidden">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <span class="material-icons text-beliyellow">
                        search
                    </span>
                </div>
                <input type="text" id="search" class="block pr-2 py-3 pl-10 w-full ring-white focus:ring-beliyellow focus:border-beliyellow rounded-md md:text-base" placeholder="Buscar...">
            </div>
            
            <div id="product-list" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-6 pb-12 lg:pb-16">
                @foreach ($products as $product)
                    @include('partials.product', ['product' => $product])
                @endforeach
            </div>

            <div class="rounded-md text-center">
                <a href="{{ route('web.products') }}" class="inline-block text-center px-4 py-3 uppercase tracking-wider text-base font-medium rounded-md text-white bg-black md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Ir a la Tienda</a>
            </div>
        </div>            
    </section>

    <section id="video" class="bg-beliyellow">
        <div class="container mx-auto px-4 lg:px-0 py-16 lg:py-24 grid lg:grid-cols-2 gap-2 lg:gap-24">
            <div class="relative" style="padding-top: 56.25%">
                <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/ONkZECn6EkM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="pt-6 lg:pt-0 text-white flex flex-col justify-center text-center lg:text-left">
                <div class="text-4xl tracking-tight font-extrabold sm:text-5xl lg:text-6xl pb-4 lg:pb-8">
                    <span class="block xl:inline">Así nace<br>un Belihand</span>
                </div>
                <p class="text-base lg:text-lg pb-6 lg:pb-8">
                    Los Belihands son productos de diseño únicos, fabricados en madera maciza torneada y pintados a mano. Sus formas son logradas mediante una superficie de revolución y pautas de diseño que le dan a cada personaje su propia identidad.<br>
                    Son piezas decorativas para uso propio, para regalo o colección.<br>
                    No son juguete.
                </p>
                <div class="rounded-md">
                    <a href="{{ route('web.about_us') }}" class="inline-block px-4 py-3 uppercase tracking-wider border border-white text-base font-medium rounded-md text-white hover:text-beliyellow bg-transparent hover:bg-white md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Conocenos mejor</a>
                </div>
            </div>
        </div>
    </section>
@endsection