<div
    class="modal"
    role="dialog"
    tabindex="-1"
    x-show="{{ $product ? 'modalProduct' : 'modalContact'}}"
    x-cloak
    x-transition
>
    <div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <form 
                    class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                    action="{{ route('web.contact') }}"
                    @click.outside="{{ $product ? 'modalProduct' : 'modalContact'}} = false"
                    method="POST"
                >
                    @csrf

                    @if ($product)
                        <input type="hidden" name="product" value="{{ $product->id }}">
                    @endif

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                @if ($product)
                                    <span class="material-icons text-belired">
                                        sentiment_satisfied_alt
                                    </span>
                                @else
                                    <span class="material-icons text-belired">
                                        mail_outline
                                    </span>
                                @endif
                            </div>

                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                @if ($product)
                                    <h3 
                                        class="text-2xl leading-6 font-extrabold text-gray-900" 
                                        id="modal-title"
                                    >
                                        ¡Ya casi es tuyo!
                                    </h3>
                                    
                                    <div class="mt-5">
                                        <p class="text-base text-gray-500">
                                            Para obtener tu Belihand, completá el formulario con tus datos y te contactaremos.
                                        </p>
                                    </div>
                                @else
                                    <h3 
                                        class="text-2xl leading-6 font-extrabold text-gray-900" 
                                        id="modal-title"
                                    >
                                        Contactanos
                                    </h3>
                                    
                                    <div class="mt-5">
                                        <p class="text-base text-gray-500">
                                            Completá el formulario con tus datos y te responderemos a la brevedad.
                                        </p>
                                    </div>
                                @endif
                                
                                <div class="mt-5">
                                    <input 
                                        type="text" 
                                        name="name"
                                        required
                                        class="w-full p-2 text-base font-normal text-gray-700 bg-white border border-gray-200 rounded m-0 ring-white focus:ring-beliyellow focus:border-beliyellow" 
                                        placeholder="Nombre *"
                                    >
                                </div>
                                
                                <div class="mt-5">
                                    <input 
                                        type="email" 
                                        name="email"
                                        required
                                        class="w-full p-2 text-base font-normal text-gray-700 bg-white border border-gray-200 rounded m-0 ring-white focus:ring-beliyellow focus:border-beliyellow" 
                                        placeholder="Email *"
                                    >
                                </div>
                                
                                <div class="mt-5">
                                    <input 
                                        type="text" 
                                        name="phone"
                                        class="w-full p-2 text-base font-normal text-gray-700 bg-white border border-gray-200 rounded m-0 ring-white focus:ring-beliyellow focus:border-beliyellow" 
                                        placeholder="Teléfono"
                                    >
                                </div>
                                
                                <div class="mt-5">
                                    <textarea 
                                        name="comments" 
                                        class="w-full p-2 text-base font-normal text-gray-700 bg-white border border-solid border-gray-200 rounded m-0 ring-white focus:ring-beliyellow focus:border-beliyellow border border-gray-200" 
                                        placeholder="Comentario"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mt-3">
                        <button 
                            class="w-full inline-flex p-2 uppercase tracking-wider text-base justify-center font-medium text-white rounded bg-belired hover:bg-black mb-2 sm:mb-0 sm:ml-2" 
                        >
                            Enviar
                        </button>

                        <button 
                            type="button"
                            class="w-full inline-flex p-2 uppercase tracking-wider text-base justify-center font-medium text-belired rounded bg-transparent hover:bg-white sm:mr-2" 
                            x-on:click="{{ $product ? 'modalProduct' : 'modalContact'}} = false"
                        >
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>