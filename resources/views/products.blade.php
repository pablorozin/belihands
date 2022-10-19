@extends('layouts.web')

@section('main')
    <section id="products" class="py-16 lg:py-24 bg-gray-100">
        <div class="container mx-auto px-4 lg:px-8">
            @include('partials.sectionHeader', [
                'title' => 'Tienda',
                'breadcrumbs' => [
                    ['value' => 'Inicio', 'link' => route('web.home')],
                    ['value' => 'Tienda', 'link' => route('web.products')],
                    $type ? [
                        'value' => $type->name, 
                        'link' => route('web.products', [
                            'type' => $type->slug
                        ])
                    ] : false,
                    $category ? [
                        'value' => $category->name, 
                        'link' => route('web.products', [
                            'type' => $type->slug, 
                            'category' => $category->slug
                        ])
                    ] : false,
                ]
            ])

            <div class="relative mb-6 md:hidden">
                @include('partials.search')
            </div>

            <div class="grid md:grid-cols-2 gap-2 lg:gap-6 pb-12 items-center">
                <div> 
                    @include('partials.filter')
                </div>
                <div class="flex justify-between md:justify-end">
                    @include('partials.pagination', ['products' => $products])
                </div>
            </div>
            
            <div id="product-list" class="grid sm:grid-cols-2 xl:grid-cols-4 gap-2 lg:gap-6 pb-12">
                @foreach ($products as $product)
                    @include('partials.product', ['product' => $product])
                @endforeach
            </div>

            <div class="grid md:grid-cols-2 gap-2 lg:gap-6">
                <div></div>
                <div class="flex justify-between md:justify-end">
                    @include('partials.pagination', ['products' => $products])
                </div>
            </div>
        </div>            
    </section>
@endsection