@extends('layouts.app')
 
@section('content')
<section class="mt-32">
	<div class="flex h-fit justify-center mb-8">
		<div class="w-5/6 grid justify-items-center lg:w-2/6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500">
			<h2 class="font-bold text-white text-3xl m-3 text-center uppercase">Urýchlite objednávanie predvyplnením údajov</h2>
			
			<form method="POST" action="{{ route('voluntary_register') }}" class="w-full">
				<div class="inline-grid w-full p-5">
					@csrf
					
					<!-- Name -->
					<label for="name" class="text-white float-left">Meno:</label>
					<input id="name" type="text" name="name" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
					
					<!-- Surname -->
					<label for="surname" class="text-white float-left">Priezvisko:</label>
					<input id="surname" type="text" name="surname" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
					
					<div class="flex justify-between">
						<!-- Street -->
						<div class="">
							<label for="street" class="text-white float-left">Ulica:</label>
							<input id="street" type="text" name="street" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
						</div>

						<!-- Street Number -->
						<div class="ml-2">
							<label for="street_n" class="text-white float-left">Číslo ulice:</label>
							<input id="street_n" type="text" name="street_n" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
						</div>
					</div>

					<!-- City -->
					<label for="city" class="text-white float-left">Mesto:</label>
					<input id="city" type="text" name="city" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
					
					<!-- PSC -->
					<label for="postcode" class="text-white float-left">PSČ:</label>
					<input id="postcode" type="text" name="postcode" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
					
					<!-- Phone -->
					<label for="phone_number" class="text-white float-left">Telefónne číslo:</label>
					<input id="phone_number" type="text" name="phone_number" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />
					
					<!-- Buttons -->
					<div class="grid grid-cols-2 gap-16 mt-4">
						<a href="/home" class="underline text-white hover:text-stone-200 mb-2 float-right">Neskôr</a>
						<button type="submit" name="submit" value="submit" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Neskôr</button>
						<x-button class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
							Dokončiť registráciu
						</x-button>
					</div>

					<!-- Validation Errors -->
					<x-auth-validation-errors class="mb-4 mt-4 text-center" :errors="$errors" />

				</div>
			</form>
		</div>
	</div>
</section>
@endsection
