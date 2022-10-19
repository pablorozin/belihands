<div
    class="modal"
    role="dialog"
    tabindex="-1"
    x-show="modalPackaging"
    x-cloak
    x-transition
>
    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div 
                    class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-3xl sm:w-full"
                    x-on:click.outside="modalPackaging = false"
                >
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="text-center sm:text-left w-full">											
                                <p class="text-base text-gray-500">
                                    <img src="{{ asset('storage/'.$product->type->packaging_image) }}" alt="Los Millonarios" class="mx-auto self-center">
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mt-3">
                        <button 
                            class="w-full inline-flex p-2 uppercase tracking-wider text-base justify-center font-medium text-belired rounded bg-transparent hover:bg-white sm:mr-2" 
                            x-on:click="modalPackaging = false"
                        >
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>