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
					<p class="m-4 text-slate-900">Košík</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
					<p class="m-4">Doprava a platba</p>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
					<p class="m-4">Dodacie údaje</p>				
				</div>
			</div>
		
		
			<div class="flex justify-center">
				<div class="bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 w-11/12 md:w-10/12 p-4">
					
					<div class="flex flex-wrap py-2 gap-4 place-items-center border-b-2">
						<div class=""><img src="{{ asset('images/dog_food.jpg') }}" alt="" class="object-cover w-20 h-20 block"></div>
						<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">Dog Fantasy miska ťažká 13,7 cm 0,55 l nerez</h1></div>
						
						<div class="flex flex-nowrap gap-4 place-items-center">
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
									<i class="fa-solid fa-minus"></i>
								</button>
							</div>
						
							<input from="search_form" type="number" name="high_price" class="w-16 h-8 bg-neutral-200 placeholder-gray-500 rounded-md px-2" type="text" value="1">
							
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
									<i class="fa-solid fa-plus"></i>
								</button>
							</div>
							
							<div class="w-20"><p class="text-xl font-semibold text-right text-white">2,99€</p></div>
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-8 w-8 rounded-full">
									<i class="fa-solid fa-x"></i>
								</button>
							</div>
						</div>
					</div>
					
					<div class="flex flex-wrap py-2 gap-4 place-items-center border-b-2">
						<div class=""><img src="{{ asset('images/monkey.jpg') }}" alt="" class="object-cover w-20 h-20 block"></div>
						<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">Plyšová opica</h1></div>
						
						<div class="flex flex-nowrap gap-4 place-items-center">
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
									<i class="fa-solid fa-minus"></i>
								</button>
							</div>
						
							<input from="search_form" type="number" name="high_price" class="w-16 h-8 bg-neutral-200 placeholder-gray-500 rounded-md px-2" type="text" value="1">
							
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
									<i class="fa-solid fa-plus"></i>
								</button>
							</div>
							
							<div class="w-20"><p class="text-xl font-semibold text-right text-white">10,99€</p></div>
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-8 w-8 rounded-full">
									<i class="fa-solid fa-x"></i>
								</button>
							</div>
						</div>
						
					</div>

					<div class="flex flex-wrap py-2 gap-4 place-items-center border-b-2">
						<div class=""><img src="{{ asset('images/bird_cage.jpg') }}" alt="" class="object-cover w-20 h-20 block"></div>
						<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">Klietka</h1></div>
						
						<div class="flex flex-nowrap gap-4 place-items-center">
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
									<i class="fa-solid fa-minus"></i>
								</button>
							</div>
						
							<input from="search_form" type="number" name="high_price" class="w-16 h-8 bg-neutral-200 placeholder-gray-500 rounded-md px-2" type="text" value="1">
							
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
									<i class="fa-solid fa-plus"></i>
								</button>
							</div>
							
							<div class="w-20"><p class="text-xl font-semibold text-right text-white">5,99€</p></div>
							<div class="">
								<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-8 w-8 rounded-full">
									<i class="fa-solid fa-x"></i>
								</button>
							</div>
						</div>
					</div>
					

					<div class="flex justify-end py-2">
						<p class="text-2xl font-semibold text-white">Spolu: 19,97€</p>
					</div>
					
					<div class="flex justify-end">
						<a href="cart2.html">
							<button class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
								Pokračovať
								<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
							</button>
						</a>
					</div>
					
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