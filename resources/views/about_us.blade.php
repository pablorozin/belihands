@extends('layouts.web')

@section('main')
<section id="products" class="py-16 lg:py-24 bg-gray-100">
    <div class="container mx-auto px-4 lg:px-0">
        @include('partials.sectionHeader', [
            'title' => 'Nosotros',
            'breadcrumbs' => [
                ['value' => 'Inicio', 'link' => route('web.home')],
                ['value' => 'Nosotros', 'link' => route('web.about_us')],
            ]
        ])
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
        </div>
    </div>
</section>

<section id="project">
    <div class="container mx-auto px-4 lg:px-0 py-16 lg:py-24 grid lg:grid-cols-2 gap-2 lg:gap-24">
        <div class="pt-6 lg:pt-0 flex flex-col justify-center text-center lg:text-left">
            <div class="text-4xl tracking-tight font-extrabold sm:text-5xl lg:text-6xl pb-4 lg:pb-8 lg:text-right">
                <span class="block xl:inline">Proyecto<br>Belihands</span>
            </div>
        </div>
        <div class="pt-6 lg:pt-0 flex flex-col justify-center">
            <p class="text-base lg:text-lg pb-2 lg:pb-4">
                Todo surge hace 30 años, producto de la combinación de varios elementos que se fueron mezclando y conformando la idea rectora del Proyecto.
            </p>
            <p class="text-base lg:text-lg pb-2 lg:pb-4">
                En un principio la idea surge sin ninguna pretensión y solo como un ejercicio de diseño que se fue desarrollando con el tiempo y que hasta hoy perdura.<br>
                El concepto de diseño industrial consistió en concebir personajes siguiendo pautas creativas basadas en lo siguiente:
            </p>
            <ul class="text-base lg:text-lg pb-2 lg:pb-4 list-disc pl-4">
                <li>El fútbol como pasión.</li>
                <li>La forma y el color como identificación propia de cada Club, por fuera de su nombre convencional.</li>
                <li>La originalidad de producir formas con determinadas y sutiles intervenciones que dan a cada personaje identidad propia.</li>
                <li>La idea que el desarrollo tenga un componente mayoritario de intervención artesanal.</li>
                <li>Que sean productos decorativos, no lúdicos y que sean atractivos por su propia originalidad e incluso puedan integrar la colección de aquellos entusiastas con esa pasión.</li>
            </ul>
            <p class="text-base lg:text-lg">
                Los diseños buscan combinar las formas con los nombres de cada personaje, cada uno con su propia característica, en donde se interviene el cuerpo de la matriz agregándole varios elementos formales para su acabado final.
            </p>
        </div>
    </div>
</section>

<section id="sticks" class="bg-sky-50   ">
    <div class="container mx-auto px-4 lg:px-0 py-16 lg:py-24 grid lg:grid-cols-2 gap-2 lg:gap-24">
        <div class="pt-6 lg:pt-0 flex flex-col justify-center">
            <img class="w-full" src="/img/album.jpg" alt="">
        </div>
        <div class="pt-6 lg:pt-0 flex flex-col justify-center">
            <div class="text-4xl tracking-tight font-extrabold sm:text-5xl lg:text-6xl pb-4 lg:pb-8 text-center lg:text-left">
                <span class="block xl:inline">Los Belihands</span> <span class="block xl:inline italic">Sticks</span>
            </div>
            <p class="text-base lg:text-lg pb-2 lg:pb-4">
                Son Los Belihands llevados al diseño gráfico.
            </p>
            <ul class="text-base lg:text-lg list-disc pl-4">
                <li>Stickers impresos en vinilo autoadhesivo troquelado con o sin imán.</li>
                <li>Álbum de 30 páginas con stickers de 52 equipos del Fútbol Argentino y la Historia de cada club.</li>
            </ul>
        </div>
    </div>
</section>
@endsection