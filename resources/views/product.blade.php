@extends('layouts.web')

@section('main')
    <section id="products" class="py-16 lg:py-24 bg-gray-100">
        <div class="container mx-auto px-4 lg:px-0">
            @include('partials.sectionHeader', [
                'title' => false,
                'breadcrumbs' => [
                    ['value' => 'Inicio', 'link' => route('web.home')],
                    ['value' => 'Tienda', 'link' => route('web.products')],
                    ['value' => $product->type->name, 'link' => route('web.products', ['type' => $product->type->slug])],
                    ['value' => $product->category->name, 'link' => route('web.products', ['type' => $product->type->slug, 'category' => $product->category->slug])],
                ]
            ])

            <div class="relative mb-6 md:hidden">
                @include('partials.search')
            </div>

            <div 
                id="product-list" 
                class="mb-16" 
                x-data="{ modalProduct: false }" 
                @keydown.escape="modalProduct = false"
            >
                @include('partials.popups.contact', ['product', $product])
                
                <div class="flex sm:flex-col justify-between relative rounded-md p-9 md:p-20 bg-white border border-gray-200">
                    <div class="info absolute top-2 left-2">
                        @if ($product->is_bestseller)
                            <div class="bg-black p-1 rounded-md text-white flex uppercase text-xs tracking-tighter mb-1 pr-2">
                                <span class="material-icons text-sm mr-1">
                                    star
                                </span>
                                <span class="self-center">                                
                                    Nuevo
                                </span>
                            </div>
                        @endif

                        @if ($product->is_new)
                            <div class="bg-belired p-1 rounded-md text-white flex uppercase text-xs tracking-tighter mb-1 pr-2">
                                <span class="material-icons text-sm mr-1">
                                    local_fire_department
                                </span>
                                <span class="self-center">                                
                                    Más vendido
                                </span>
                            </div>
                        @endif

                        @if ($product->offer_price)
                            <div class="bg-beliblue p-1 rounded-md text-white flex uppercase text-xs tracking-tighter mb-1 pr-2">
                                <span class="material-icons text-sm mr-1">
                                    notifications
                                </span>
                                <span class="self-center">                                
                                    Oferta
                                </span>
                            </div>
                        @endif
                    </div>

                    <div id="product-list" class="grid lg:grid-cols-2 gap-2">
                        <div class="image pb-9">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Los Millonarios" class="mx-auto self-center">
                        </div>
                        <div class="flex flex-col justify-between text-center lg:text-left">
                            <div class="">
                                <div class="title font-extrabold text-4xl sm:text-5xl lg:text-6xl pb-4">
                                    {{ $product->name }}
                                </div>

                                <div class="code text-gray-400 text-sm md:text-lg pb-6">
                                    {{ $product->code }}
                                </div>

                                @if ($product->type->description)
                                    <div class="description text-sm md:text-lg text-left">
                                        <p>
                                            {!! nl2br($product->type->description) !!}
                                        </p>
                                    </div>
                                @endif

                                @if ($product->type->video_code)
                                    <div class="description text-sm md:text-lg pb-6 text-left">
                                        <a 
                                            href="https://www.youtube.com/watch?v={{ $product->type->video_code }}" 
                                            class="flex mt-4 text-belired hover:text-black"
                                        >
                                            <span class="material-icons mr-2">play_circle_filled</span>
                                            <span class="self-center">
                                                Ver video "Así nace un Bellihand"
                                            </span>
                                        </a>
                                    </div>
                                @endif

                                @if ($product->type->presentation)
                                    <div class="presentation text-xs md:text-base pb-3 font-bold text-left">
                                        Presentación
                                    </div>
                                    <div class="presentation text-xs md:text-base pb-6 text-left">
                                        {!! nl2br($product->type->presentation) !!}
                                    </div>
                                @endif

                                <div class="price text-2xl md:text-4xl pb-9">
                                    @if ($product->offer_price)
                                        ${{ $product->offer_price }} 
                    
                                        <small class="line-through text-gray-400">${{ $product->type->price }}</small>
                                    @else
                                        ${{ $product->type->price }}
                                    @endif
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="w-full lg:w-auto inline-block p-4 lg:py-6 lg:px-12 uppercase tracking-wider text-lg lg:text-2xl text-center font-medium rounded-md text-white bg-belired hover:bg-black md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200" x-on:click="modalProduct = true">¡Lo Quiero!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section> 
@endsection