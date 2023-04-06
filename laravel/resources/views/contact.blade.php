@extends('layouts.app')
 
@section('content')
<section class="mt-24 mb-24">
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
@endsection