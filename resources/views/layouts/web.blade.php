<!DOCTYPE html>
<html lang="<?php echo (isset($lang) and ! empty($lang)) ? str_replace('"', '\'', $lang) : 'es'; ?>" xmlns:fb="http://developers.facebook.com/schema/" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
	<head>
		<!-- Charset -->
		<meta charset="UTF-8">

		<!-- Mobile -->
		<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1" >

		<!-- Meta Data -->
		<meta name='googleBot' content="index, follow" >
		<meta name="robots" content="index, follow" >
		<meta name="revisit-after" content="5 days" >
		<meta name="copyright" content="{{ config('web.seo.title') }}" >
		<meta name="publisher" content="{{ config('web.seo.title') }}" >
		<meta name="distribution" content="Global" >
		<meta name="city" content="{{ config('web.seo.city') }}" >
		<meta name="country" content="{{ config('web.seo.country') }}" >
		<meta name="title" content="{{ config('web.seo.title') }}" >
		<meta name="description" content="{{ config('web.seo.description') }}" >

		<!-- Facebook -->
		<meta property="og:title" content="{{ config('web.seo.title') }}">
		<meta property="og:type" content="web.seosite">
        <meta property="og:url" content="{{ request()->url() }}">
		<meta property="og:image" content="{{ config('web.seo.image') }}">
		<meta property="og:site_name" content="{{ config('web.seo.title') }}">
		<meta property="og:description" content="{{ config('web.seo.description') }}">

		<!-- Google -->
		<meta itemprop="name" content="{{ config('web.seo.title') }}">
		<meta itemprop="description" content="{{ config('web.seo.description') }}">
		<meta itemprop="image" content="{{ config('web.seo.image') }}">
		<meta itemprop="url" content="{{ request()->url() }}">

		<!-- Twitter -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@">
		<meta name="twitter:creator" content="@">
		<meta name="twitter:title" content="{{ config('web.seo.title') }}">
		<meta name="twitter:description" content="{{ config('web.seo.description') }}">
		<meta name="twitter:image" content="{{ config('web.seo.image') }}">

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Titulo -->
		<title>{{ config('web.seo.title') }}</title>

		<!--[if lt IE 7]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
		<![endif]-->

		<!--[if lt IE 8]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

		<!--[if lt IE 10]>
			<script src="/js/Placeholders.min.js"></script>
        <![endif]-->
        
        @foreach (config('web.styles') as $style)
		    <link rel="stylesheet" type="text/css" media="all" href="{{ $style }}">
        @endforeach

        @foreach (config('web.scripts') as $script)
            <script type="text/javascript" src="{{ $script }}"></script>
        @endforeach

		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">
		
		@if(View::exists('partials.head'))
			@include('partials.head')
		@endif

		@yield('head')

    </head>
    
	<body 
		id="{{ config('web.sectionId') }}"
		x-data="{ 
			openMenu: false,
			modalContact : false,
			openDropdown: false,
			modalProduct: false,
			modalMessage: true,
		}"
		@keydown.escape="modalMessage = false"
	>
		@if (session('message'))
			<div
				class="modal"
				role="dialog"
				tabindex="-1"
				x-show="modalMessage"
				x-cloak
				x-transition
			>
				<div class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
					<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
			
					<div class="fixed z-50 inset-0 overflow-y-auto">
						<div class="flex items-center sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
							<div 
								class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
								x-on:click.outside="modalMessage = false"
							>
								<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
									<div class="sm:flex sm:items-start">
										<div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">											
											<div class="mt-5">
												<p class="text-base text-gray-500">
													{{ session('message') }}
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mt-3">
			
									<button 
										class="w-full inline-flex p-2 uppercase tracking-wider text-base justify-center font-medium text-belired rounded bg-transparent hover:bg-white sm:mr-2" 
										x-on:click="modalMessage = false"
									>
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif

		@if(View::exists('partials.header'))
			@include('partials.header')
		@endif

		@yield('header')

		<div class="wrapper">
			@yield('main')
		</div>

		@if(View::exists('partials.footer'))
			@include('partials.footer')
		@endif
	</body>
</html>