<div id="whatsapp" class="fixed bottom-3 right-3 z-50 transition ease-in-out hover:scale-110 duration-300">
    <a href="https://wa.me/+5491151311470/" class="bg-lime-500 hover:bg-lime-600 p-4 rounded-full shadow inline-block lg:hidden">
        <img src="/img/icons/whatsapp.svg" alt="" class="w-10">
    </a>
    <a href="https://web.whatsapp.com/send?phone=+5491151311470/" class="bg-lime-500 hover:bg-lime-600 p-4 rounded-full shadow hidden lg:inline-block">
        <img src="/img/icons/whatsapp.svg" alt="" class="w-10">
    </a>
</div>

<footer class="bg-white">
    <div class="container mx-auto px-4 lg:px-8 py-16 lg:py-24 grid lg:grid-cols-3 gap-8">
        <div class="text-center lg:text-left">
            © 2022 <a href="{{ route('web.home') }}" class="text-belired hover:text-black font-bold uppercase">Los Bellihands®</a><br>
            Todos los derechos reservados.
        </div>
        <div class="text-center">
            <a href="https://www.instagram.com/belihands/" class="inline-block px-3 lg:py-3"><img src="/img/icons/social-instagram.svg" alt="" class="w-6 lg:w-8"></a>
            <a href="https://www.facebook.com/belihands/" class="inline-block px-3 lg:py-3"><img src="/img/icons/social-facebook.svg" alt="" class="w-6 lg:w-8"></a>
            <a href="https://wa.me/+5491151311470/" class="px-3 lg:py-3 inline-block lg:hidden">
                <img src="/img/icons/social-whatsapp.svg" alt="" class="w-6 lg:w-8">
            </a>
            <a href="https://web.whatsapp.com/send?phone=+5491151311470/" class="px-3 lg:py-3 hidden lg:inline-block">
                <img src="/img/icons/social-whatsapp.svg" alt="" class="w-6 lg:w-8">
            </a>
            <div class="inline-block px-3 lg:py-3 cursor-pointer">
                <img src="/img/icons/social-email.svg" alt="" class="w-6 lg:w-8" @click="modalContact = true">
            </div>
        </div>
        <div class="text-center lg:text-right">
            Diseño y desarrollo<br>
            <a href="https://www.heniax.com" target="_blank" class="text-belired hover:text-black font-bold uppercase">Heniax</a>
        </div>
    </div>
</footer>