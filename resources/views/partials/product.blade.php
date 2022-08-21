<a href="{{ $product->url }}" class="flex sm:flex-col justify-between relative rounded-md px-3 py-6 bg-white hover:shadow-lg border border-gray-200 transition ease-in-out hover:-translate-y-2">
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
    <div class="image w-1/2 sm:w-full sm:pb-6 flex">
        <img src="{{ $product->image }}?{{ $product->id }}" alt="Los Millonarios" class="w-3/4 mx-auto self-center">
    </div>
    <div class="w-1/2 sm:w-full flex flex-col justify-between sm:text-center">
        <div class="sm:h-24">
            <div class="title font-extrabold text-2xl leading-7 pb-2">
                {{ $product->name }}
            </div>
            <div class="code text-gray-400 text-sm">
                {{ $product->code }}
            </div>
            <div class="price text-xl pb-3">
                @if ($product->offer_price)
                    ${{ $product->offer_price }} 

                    <small class="line-through text-gray-400">${{ $product->type->price }}</small>
                @else
                    ${{ $product->type->price }}
                @endif
            </div>
        </div>
        <div class="buttons">
            <div class="inline-block px-4 py-3 uppercase tracking-wider text-sm font-medium rounded-md text-white bg-belired hover:bg-black md:py-4 md:text-lg md:px-10 transition ease-in-out hover:scale-110 duration-200">Ver más</div>
        </div>
    </div>
</a>