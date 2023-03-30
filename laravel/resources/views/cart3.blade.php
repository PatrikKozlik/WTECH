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
					
					<form action="">
						<div class="grid place-items-center w-full">
							<div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6 justify-items-center w-full md:w-3/4 xl:w-2/3 py-4">
								<div class="w-full">
									<label for="firstname" class="text-white float-left">Meno:</label>
									<input id="firstname" type="text" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="lastname" class="text-white float-left">Priezvisko:</label>
									<input id="lastname" type="text" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="street" class="text-white float-left">Ulica:</label>
									<input id="street" type="text" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="city" class="text-white float-left">Mesto:</label>
									<input id="city" type="text" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="psc" class="text-white float-left">PSČ:</label>
									<input id="psc" type="text" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="telephone-number" class="text-white float-left">Telefónne číslo:</label>
									<input id="telephone-number" type="tel" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="email" class="text-white float-left">E-mailová adresa:</label>
									<input id="email" type="email" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
								<div class="w-full">
									<label for="password" class="text-white float-left">Heslo:</label>
									<input id="password" type="password" class="w-full h-10 rounded-md p-2 text-lg">
								</div>
							</div>
							
							<div class="my-2">
								<input id="load-data" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="load-data" class="ml-2 text-sm font-medium text-white">Použiť uložené údaje</label>
							</div>
							
							<div class="my-2">
								<input id="terms-consent" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="terms-consent" class="ml-2 text-sm font-medium text-white">Súhlasím s obchodnými podmienkami</label>
							</div>
						</div>


						
					</form>
					<div>
						<a href="cart2.html">
							<button type="button" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
								<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
								Späť
							</button>
						</a>
						
						<button id="save_button" class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full float-right">
							Pokračovať
							<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
						</button>
						
					</div>
				</div>
			</div>
		</section>


		{{-- Footer --}}
		@include('layouts/footer')

		<!-- Modal content -->
		<div id="saveModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
			<div class="relative w-full h-full max-w-2xl md:h-auto">
				<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
					<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
						<h3 class="text-xl font-semibold text-white">
							Chcete si uložiť vaše údaje do vášho profilu?
						</h3>
						<button onclick="document.getElementById('saveModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
							<i class="fa fa-times text-2xl" aria-hidden="true"></i> 
						</button>
					</div>
					<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
						<button form="edit_pruduct_form" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Nie</button>
						<button form="edit_pruduct_form" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Áno</button>
					</div>
				</div>
			</div>
		</div>


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
	<!-- Alert box for saving data-->
	<script>
		const save = document.querySelector("#save_button");
        const modal = document.querySelector("#saveModal");
        
        save.addEventListener("click", () => {
            modal.style.display = "flex";
        });
        addEventListener("resize", (event) => {
            modal.style.display = "none";
        });
	</script>
</html>