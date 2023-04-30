@extends('layouts.app')
 
@section('content')
<section class="mt-24 mb-24">
	<div class="flex justify-center">
		<div class="flex w-10/12 mb-4 place-items-center text-xl text-slate-500 font-bold uppercase">
			<p class="m-4">Košík</p>
			<i class="fa fa-arrow-right" aria-hidden="true"></i>
			<p class="m-4">Doprava a platba</p>
			<i class="fa fa-arrow-right" aria-hidden="true"></i>
			<p class="m-4 text-slate-900">Dodacie údaje</p>				
		</div>
	</div>

	<div class="flex justify-center">
		<div class="bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 w-11/12 md:w-10/12 p-4">		
			<h1 class="text-3xl text-white font-bold text-center m-4">Dodacie údaje</h1>
			
			<form id="finish_order" method="POST" action="{{route('save_product')}}">
				@csrf
			</form>
				<div class="grid place-items-center w-full">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6 justify-items-center w-full md:w-3/4 xl:w-2/3 py-4">
						<div class="w-full">
							<label for="firstname" class="text-white float-left">Meno:</label>
							<input form="finish_order" name="firstname" id="firstname" type="text" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						<div class="w-full">
							<label for="lastname" class="text-white float-left">Priezvisko:</label>
							<input form="finish_order" name="lastname" id="lastname" type="text" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						<div class="w-full">
							<label for="street" class="text-white float-left">Ulica:</label>
							<input form="finish_order" name="street" id="street" type="text" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						<div class="w-full">
							<label for="street_num" class="text-white float-left">Číslo:</label>
							<input form="finish_order" name="street_num" id="street_num" type="text" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						<div class="w-full">
							<label for="city" class="text-white float-left">Mesto:</label>
							<input form="finish_order" name="city" id="city" type="text" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						<div class="w-full">
							<label for="psc" class="text-white float-left">PSČ:</label>
							<input form="finish_order" name="postcode" id="psc" type="text" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						<div class="w-full">
							<label for="email" class="text-white float-left">E-mailová adresa:</label>
							<input form="finish_order" name="email" id="email" type="email" class="w-full h-10 rounded-md p-2 text-lg" required>
						</div>
						{{-- @if($need_address == 1)
							<div class="w-full">
								<label for="password" class="text-white float-left">Adresa pošty:</label>
								<input form="finish_order" name="postaddress" id="password" type="password" class="w-full h-10 rounded-md p-2 text-lg" required>
							</div>
						@endif --}}
					</div>
					@auth
						<div class="my-2">
							<form id="reg_post" method="POST" action="{{route('finish_registered')}}">
								@csrf
								<button form="reg_post" type="submit" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
									Objednať ako prihlasený používateľ
								</button>
							</form>
						</div>
					@endauth
					
					<div class="my-2">
						<input form="finish_order" id="terms-consent" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded" required>
						<label for="terms-consent" class="ml-2 text-sm font-medium text-white">Súhlasím s obchodnými podmienkami</label>
					</div>
				</div>


				
			
			<div>
				<a href="{{route('cart1')}}">
					<button type="button" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
						<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
						Späť
					</button>
				</a>
				
				<button form="finish_order" type="submit" id="save_button" class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full float-right">
					Pokračovať
					<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</button>
				
			</div>
		</div>
	</div>
</section>
@endsection