<nav 
    class="px-4 lg:px-8 py-3 fixed left-0 right-0 top-0 z-40"
    @keydown.escape="openMenu = false"
    @click.outside="openMenu = false"
    :class="{ 
        'shadow-lg bg-beliblue' : openMenu, 
        'bg-beliblue' : !openMenu
    }"
>
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ route('web.home') }}">
            <img 
                src="/img/los-belihands-logo.svg" 
                class="h-16 lg:h-24" 
                alt="Los Belihands logo"
            >
        </a>

        <div class="flex md:order-2">
            <div class="hidden relative mr-3 md:mr-0 md:block">
                @include('partials.search')
            </div>
            

            <button 
                class="inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg md:hidden focus:outline-none" 
                @click="openMenu = ! openMenu"
                type="button"
            >
                <span class="material-icons" x-show="!openMenu">
                    menu
                </span>

                <span class="material-icons" x-show="openMenu">
                    close
                </span>
            </button>
        </div>

        <div 
            class="w-full md:block md:w-auto md:ml-auto md:pr-8"
            :class="{ 'block shadow-3xl': openMenu, 'hidden': !openMenu }"
            @click.outside="openMenu = !false"
            x-cloak
        >
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-4 lg:space-x-12 md:mt-0 md:text-base font-medium">
                <li>
                    <a 
                        href="{{ route('web.home') }}" 
                        class="block py-2 pr-4 pl-3 text-white hover:text-beliyellow md:p-0 uppercase tracking-widest"
                    >
                        Inicio
                    </a>
                </li>

                <li>
                    <button 
                        href="#" 
                        class="flex justify-between py-2 pr-4 pl-3 text-white hover:text-beliyellow md:p-0 uppercase tracking-widest" 
                        aria-current="page" 
                        @click=" openDropdown = ! openDropdown"
                    >
                        Tienda

                        <span class="material-icons" x-show="!openDropdown">
                            expand_more
                        </span>

                        <span class="material-icons" x-show="openDropdown">
                            expand_less
                        </span>
                    </button>

                    <ul 
                        class="flex flex-col md:mt-0 md:text-base font-medium bg-sky-900 md:absolute rounded-md md:top-20 md:shadow-xl"
                        x-show="openDropdown"
                        @click.outside="openDropdown=false"
                        x-cloak
                    >
                        <li>
                            <a 
                                href="{{ route('web.products') }}" 
                                class="block py-1 px-3 text-white hover:text-beliyellow uppercase tracking-widest"
                            >Todo</a>
                        </li>

                        @foreach (\App\Models\ProductType::all() as $type)
                            <li>
                                <a 
                                    href="{{ 
                                        route('web.products', [
                                            'type' => $type->slug
                                        ]) 
                                    }}" 
                                    class="block py-1 px-3 text-white hover:text-beliyellow uppercase tracking-widest"
                                >
                                    {{ $type->name }}
                                </a>
                            </li>

                            @foreach (\App\Models\ProductCategory::all() as $category)
                                @if (
                                    \App\Models\Product::query()
                                        ->active()
                                        ->where('product_category_id', $category->id)
                                        ->where('product_type_id', $type->id)
                                        ->count()
                                )
                                    <li>
                                        <a 
                                            href="{{ 
                                                route('web.products', [
                                                    'type' => $type->slug, 
                                                    'category' => $category->slug
                                                ]) 
                                            }}" 
                                            class="block py-1 pl-9 pr-3 text-white hover:text-beliyellow tracking-widest"
                                        >
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a 
                        href="{{ route('web.about_us') }}" 
                        class="block py-2 pr-4 pl-3 text-white hover:text-beliyellow md:p-0 uppercase tracking-widest"
                    >Nosotros</a>
                </li>

                <li @click="modalContact = true, openMenu = false">
                    <a 
                        href="#" 
                        class="block py-2 pr-4 pl-3 text-white hover:text-beliyellow md:p-0 uppercase tracking-widest"
                    >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@include('partials.popups.contact', ['product' => false])