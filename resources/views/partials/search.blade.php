<form action="{{ route('web.products') }}" method="GET">
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <span class="material-icons text-beliyellow">
            search
        </span>
    </div>

    <input 
        type="text" 
        name="q"
        class="block pr-2 py-3 pl-10 w-full ring-white focus:ring-beliyellow focus:border-beliyellow rounded-md md:text-base" 
        placeholder="Buscar..."
    >
</form>