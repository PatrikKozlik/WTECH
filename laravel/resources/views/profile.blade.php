@extends('layouts.app')
 
@section('content')
<section class="mt-20">
	<h1 class="text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-amber-700 from-amber-300">Môj</span> profil</h1>
	
	<div class="flex justify-center">
		<form method="POST" action="{{route('profile')}}" class="w-10/12">
			@csrf
			<div class="grid grid-cols-1 w-10/12">
				<label class="font-bold w-full  py-1">Meno</label>
				<input name="first_name" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="{{ Auth::user()->first_name }}">
									
				<label class="w-full font-bold py-1">Priezvisko</label>
				<input name="last_name" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="{{ Auth::user()->last_name }}">
				
				<label class=" w-full font-bold py-1">Názov ulica</label>
				<input name="street" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="@isset($address){{$address->street}}@endisset">
				
				<label class=" w-full font-bold py-1">Číslo ulice</label>
				<input name="street_n" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="@isset($address){{$address->street_n}}@endisset">

				<label class=" w-full font-bold py-1">Mesto</label>
				<input name="city" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="@isset($address){{$address->city}}@endisset">
				
				<label class=" w-full font-bold py-1">PSC</label>
				<input name="postal_code" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="@isset($address){{$address->postal_code}}@endisset">
				
				<label class=" w-full font-bold py-1">Telefonne číslo</label>
				<input name="phone_number" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="{{ Auth::user()->phone }}">
				
				<label class=" w-full font-bold py-1">E-mail</label>
				<input name="email" class="focus:border-amber-500 focus:outline-none mb-5 border-2 border-amber-700 lg:w-1/3 sm:w-1/2 w-full bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" value="{{ Auth::user()->email }}">

				<button id="save" type="submit" class="w-36 mb-5 mt-2 bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full float-right">Uložiť zmeny</button>
			</div>
		</form>
	</div>

</section>

	<!-- Modal content -->
	<div id="editModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal h-full">
		<div class="relative w-full h-full max-w-2xl md:h-auto">
			<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
				<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
					<h3 class="text-xl font-semibold text-white">
						Upraviť produkt
					</h3>
					<button onclick="document.getElementById('editModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
						<i class="fa fa-times text-2xl" aria-hidden="true"></i> 
					</button>
				</div>
				<div class="p-6 space-y-6">
					<p class="leading-relaxed font-bold text-2xl text-center text-white">
						Zmena údaju
					</p>
					<form id="edit_pruduct_form" action="">
						<label for="name">Nová hodnota</label>
						<input form="edit_pruduct_form" type="text" name="name" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
						
					</form>
				</div>
				<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
					<button form="edit_pruduct_form" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Uložiť zmeny</button>
					<button onclick="document.getElementById('editModal').style.display='none'" class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Zrušiť</button>
				</div>
			</div>
		</div>
	</div>
@endsection