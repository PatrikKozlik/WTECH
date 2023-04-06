@extends('layouts.app')
 
@section('content')
<section class="mt-32">
	<div class="flex h-fit justify-center mb-8">
		<div class="w-5/6 grid justify-items-center sm:w-2/6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500">
			<h2 class="font-bold text-white text-3xl m-3 text-center uppercase">Registrácia</h2>
			<form method="POST" action="{{ route('register') }}">
				<div class="inline-grid justify-items-center w-full p-5">
					@csrf

					<!-- Email Address -->
					<label for="email" class="text-white float-left">E-mail:</label>
					<input id="email" type="email" name="email" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autofocus />

					<!-- Password -->
					<label for="password" class="text-white float-left">Heslo:</label>
					<input id="password" type="password" name="password" class="my-2 w-full h-10 rounded-md p-2 text-lg" required autocomplete="new-password"/>

					<!-- Confirm Password -->
					<label for="password_confirmation" class=" float-left text-white">Potvrďte heslo:</label>
					<input id="password_confirmation" type="password" name="password_confirmation" class="my-2 w-full h-10 rounded-md p-2 text-lg" required />

					<div class="flex items-center my-3">
						<input id="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded" required>
						<label for="checkbox" class="ml-2 text-sm font-medium text-amber-900">Súhlasím s obchodnými podmienkami</label>
					</div>

					<a href="{{ route('login') }}" class="underline text-white hover:text-stone-200 mb-2 float-right">Už ste zaregistrovaný?</a>

					<x-button class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
						Zaregistrovať sa
					</x-button>

						<!-- Validation Errors -->
					<x-auth-validation-errors class="mb-4 mt-4 text-center" :errors="$errors" />
				</div>
			</form>
		</div>
	</div>
</section>
@endsection