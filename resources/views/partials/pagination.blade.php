@if ($products->lastPage() > 1)
    @if ($products->previousPageUrl())
        <div>
            <a href="{{ $products->previousPageUrl() }}" class="px-3 py-3 flex rounded-md text-white bg-black">
                <span class="material-icons">
                    chevron_left
                </span>
            </a>
        </div>
    @endif
    <div class="p-3">Página</div>
    <div>
        <select 
            @change="window.location.href = $event.target.value"
            name="select" 
            id="menu" 
            style="background-image: url(img/icons/icon-arrow-down.svg);"
            class="bg-right-top bg-no-repeat w-20 appearance-none px-3 py-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-gray-200 rounded transition ease-in-out m-0 ring-white focus:ring-beliyellow focus:border-beliyellow"
        >
            @for ($page = 1; $page <= $products->lastPage(); $page++)
                <option 
                    value="{{ $products->url($page) }}" 
                    {{ $products->currentPage() == $page ? 'selected' : '' }}
                >{{ $page }}</option>
            @endfor
        </select></div>
    <div class="p-3">
        de {{ $products->lastPage() }}
    </div>
    @if ($products->nextPageUrl())
        <div>
            <a href="{{ $products->nextPageUrl() }}" class="px-3 py-3 flex rounded-md text-white bg-black">
                <span class="material-icons">
                    chevron_right
                </span>
            </a>
        </div>
    @endif
@endif