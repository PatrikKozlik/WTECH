<!DOCTYPE html>
<html lang="sk">

	<head>
		<title>Pet Shop</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta name="description" content="Internetový obchod s potrebami pre zvieratá">
		<meta name="keywords" content="eshop, pets, food, toys, accessorities, dog, cat">
		<meta http-equiv='content-language' content='sk-sk'>
		
		<!-- CSS stylesheets -->
		<link href="{{ asset('../css/output.css') }}" rel="stylesheet">
		<link href="{{ asset('../css/style.css') }}" rel="stylesheet">

	</head>
	<body>
		
		{{-- Header --}}
		@include('../layouts/header')

		<section class="mt-32">
			<div class="flex h-fit justify-center mb-8">
				<div class="w-5/6 grid justify-items-center lg:w-2/6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500">
					<h2 class="font-bold text-white text-3xl m-3 text-center uppercase">Urýchlite objednávanie predvyplnením údajov</h2>
					<form action="" class="w-full">
						<div class="inline-grid w-full p-5">
							<label for="name" class="text-white float-left">Meno:</label>
							<input id="name" type="text" name="name" class="my-2 w-full h-10 rounded-md p-2 text-lg" >
							<label for="lastname" class="text-white float-left">Priezvisko:</label>
							<input id="lastname" type="text" name="surname" class="my-2 w-full h-10 rounded-md p-2 text-lg" >
							<label for="street" class="text-white float-left">Ulica:</label>
							<input id="street" type="text" name="street" class="my-2 w-full h-10 rounded-md p-2 text-lg" >
							<label for="city" class="text-white float-left">Mesto:</label>
							<input id="city" type="text" name="city" class="my-2 w-full h-10 rounded-md p-2 text-lg" >
							<label for="postcode" class="text-white float-left">PSČ:</label>
							<input id="postcode" type="text" name="psc" class="my-2 w-full h-10 rounded-md p-2 text-lg" >
							<label for="tel" class="text-white float-left">Telefónne číslo:</label>
							<input id="tel" type="text" name="phone_number" class="my-2 w-full h-10 rounded-md p-2 text-lg" >
							<div class="grid grid-cols-2 gap-16 mt-4">
								<button type="submit" name="submit" value="submit" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Neskôr</button>
								<button type="submit" name="submit" value="submit" class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Dokončiť registráciu</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

		{{-- Footer --}}
		@include('../layouts/footer')


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