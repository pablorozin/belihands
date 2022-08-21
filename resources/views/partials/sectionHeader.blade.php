@if ($title)
    <div class="text-center text-4xl tracking-tight font-extrabold text-black sm:text-5xl lg:text-6xl pb-6 lg:pb-6">
        <span class="block xl:inline">{{ $title }}</span>    
    </div>
@endif

<nav class="flex justify-center mb-12" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if ($breadcrumb) 
                <li class="inline-flex items-center">
                    @if ($key)
                        <span class="material-icons mr-1 text-gray-300">
                            chevron_right
                        </span>
                    @endif

                    <a 
                        href="{{ $breadcrumb['link'] }}" 
                        @class([
                            'inline-flex items-center text-sm font-medium',
                            'text-gray-700 hover:text-gray-900' => $key + 1 < count($breadcrumbs),
                            'text-gray-400' => $key + 1 == count($breadcrumbs),
                        ])
                    >   
                        <span class="self-center">{{ $breadcrumb['value'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>