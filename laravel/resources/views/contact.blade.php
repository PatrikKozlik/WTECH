<!DOCTYPE html>
<html lang="sk">

	<head>
		<title>Pet Shop</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta name="description" content="Internetový obchod s potrebami pre zvieratá">
		<meta name="keywords" content="eshop, pets, food, toys, accessorities, dog, cat">
		<meta http-equiv='content-language' content='sk-sk'>
		
		<!-- CSS stylesheets -->
		<link href="{{ asset('css/output.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	</head>
	<body>
		
		{{-- Header --}}
		@include('layouts/header')

		<section class="mt-24 pb-24">
			<div class="grid place-items-center text-center">
				<h1 class="text-3xl font-bold mb-8">Kontakt</h1>
				
				<div class="mb-4">
					<p class="font-bold">E-mailová adresa</p>
					<p class="underline"><a href="mailto:info@petshop.sk">info@petshop.sk</a></p>
				</div>
				
				<div class="mb-4">
					<p class="font-bold">Adresa</p>
					<p>
						Vajnorská 100
						<br>
						831 04 Bratislava
					</p>
				</div>
				
				<div class="mb-4">
					<p class="font-bold">Otváracie hodiny</p>
					<p>Pondelok – Piatok: 9:00 – 16:00</p>
				</div>
			
				<div class="grid place-items-center w-full md:w-3/4 lg:w-2/3">
					<p class="font-bold">Mapa</p>
					<a href="https://goo.gl/maps/7dV7qXRNSpr2Gieg7" target="_blank"><img src="{{ asset('images/map.png') }}" alt="map"></a>
				</div>
			</div>
		</section>
		
		{{-- Footer --}}
		@include('layouts/footer')


	</body>

	<!-- JS Scripts -->
	<!-- Fafa icons -->
	<script src="https://kit.fontawesome.com/1d5e2079b1.js" crossorigin="anonymous"></script>

	<!-- Mobile, button -->
	<script>
		const btn = document.querySelector("button.mobile-menu-button");
		const menu = document.querySelector(".mobile-menu");
		
		btn.addEventListener("click", () => {
		menu.classList.toggle("hidden");
		});
	</script>

</html>