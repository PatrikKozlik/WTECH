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
				<div class="w-5/6 grid justify-items-center sm:w-2/6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500">
					<h2 class="font-bold text-white text-3xl m-3 text-center uppercase">Registrácia</h2>
					<form action="voluntary_registration.html" class="w-full">
						<div class="inline-grid w-full p-5">						
							<label for="mail" class="text-white float-left">E-mail:</label>
							<input id="mail" type="email" name="email" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
							<label for="password" class="text-white float-left">Heslo:</label>
							<input id="password" type="password" name="password" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
							<label for="password-confrm" class=" float-left text-white">Potvrďte heslo:</label>
							<input id="password-confrm" type="password" name="password" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
							<div class="flex items-center my-3">
								<input id="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="checkbox" class="ml-2 text-sm font-medium text-amber-900">Súhlasím s obchodnými podmienkami</label>
							</div>
							<button type="submit" name="submit" value="submit" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Zaregistrovať sa</button>
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