<div class="relative mb-6 md:mb-0">
    <select 
        @change="window.location.href = '{{ route('web.products') }}' + $event.target.value"
        name="select" id="menu" 
        style="background-image: url(img/icons/icon-arrow-down.svg);"
        class="bg-right-top block appearance-none w-full px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-200 rounded transition ease-in-out m-0 ring-white focus:ring-beliyellow focus:border-beliyellow"
    >
        <option 
            {{ (! request()->type and ! request()->category) ? 'selected' : '' }} 
            value=""
        >
            Todos los productos
        </option>

        @foreach (\App\Models\ProductType::all() as $type) 
            <optgroup label="{{ $type->name }}">       
                <option 
                    {{ (request()->type == $type->slug and ! request()->category) ? 'selected' : '' }} 
                    value="?type={{ $type->slug }}"
                >
                    Todos los {{ $type->name }}
                </option>

                @foreach (\App\Models\ProductCategory::all() as $category)
                    @if (
                        \App\Models\Product::query()
                            ->active()
                            ->where('product_category_id', $category->id)
                            ->where('product_type_id', $type->id)
                            ->count()
                    )
                        <option 
                            {{ (request()->type == $type->slug and request()->category == $category->slug) ? 'selected' : '' }} 
                            value="?type={{ $type->slug }}&category={{ $category->slug }}"
                        >
                            {{ $category->name }}
                        </option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>