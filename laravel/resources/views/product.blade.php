@extends('layouts.app')
 
@section('content')
	<section class="mt-24">
	<div class="flex justify-center ">
		<div class="bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-144 grid md:grid-cols-2 grid-cols-1">
			<img src="assets/images/dog_food.jpg" alt="dog_food" class="p-4 w-full object-cover md:block hidden height_product">
			<div class="mt-4 relative">
				<h1 class="md:text-3xl text-xl w-11/12 pl-4 text-white font-bold line-clamp-2">Dog Fantasy miska ťažká 13,7 cm 0,55 l nerez </h1>
				<img src="assets/images/dog_food.jpg" alt="dog_food" class="p-4 w-full object-cover md:hidden h-60">
				<p class="md:text-3xl text-xl mt-6 pl-4 font-semibold text-white">2,99€</p>
				<p class="text-white md:text-xl pl-4 mt-6 font-semibold">Dostupnosť: Na sklade</p>
				<p class="text-white w-11/12 pl-4 mt-4 md:line-clamp-5 hidden">Miska je kvalitná nádoba na vodu pre Vášho miláčika, tvar misky a spodné gumové prevedenie zabraňuje nechcenému pohybu a možnosti vyliatia tekutiny. Materiál dobre umývateľný s elegantným nerezovýn vzhľadom do interiéru a exteriéru.Miska je kvalitná nádoba na vodu pre Vášho miláčika, tvar misky a spodné gumové prevedenie zabraňuje nechcenému pohybu a možnosti vyliatia tekutiny. Materiál dobre umývateľný s elegantným nerezovýn vzhľadom do interiéru a exteriéru.</p>
				<input from="search_form" type="number" name="high_price" class="w-16 bg-neutral-200 placeholder-gray-500 rounded-md px-2 left-6 bottom-20 absolute" type="text" value="1">
				<a href="">
					<button class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full ml-4 mt-6 bottom-4 absolute">Kúpiť ></button>
				</a>

			</div>
		</div>		
	</div>
	</section>
	<section class="mt-24">
	<div class="flex justify-center">
		<div class="grid-cols-3 grid w-10/12">
			<div class="col-span-2">
				<h2 class="text-3xl font-bold mb-6">Podrobnosti</h2>
				<p>Miska je kvalitná nádoba na vodu pre Vášho miláčika, tvar misky a spodné gumové prevedenie zabraňuje nechcenému pohybu a možnosti vyliatia tekutiny. Materiál dobre umývateľný s elegantným nerezovýn vzhľadom do interiéru a exteriéru.</p>
			</div>
			<img src="assets/images/dog_food.jpg" alt="dog_food" class="p-4 w-full object-cover h-72">
		</div>
	</div>

	</section>
	<section class="mb-24">
		<!-- Another products-->
		<div class="flex justify-center">
			<div class="w-10/12">
				<div class="grid lg:grid-cols-3 place-items-center md:place-items-start md:grid-cols-2 sm:grid-cols-1">
					<h2 class="lg:col-span-3 md:col-span-2 text-3xl font-bold">Podobné produkty</h2>
					<!-- ONE PRODUCT -->
					<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
						<img src="assets/images/dog_food.jpg" alt="dog_food" class="p-4 w-full object-cover h-2/3">
						<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">Dog Fantasy miska ťažká 13,7 cm 0,55 l nerez </h2>
						<p class="text-2xl pt-2 pl-4 font-bold text-white">2,99€</p>
						<a href="">
							<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
						</a>
					</div>		
					<!-- END OF ONE PRODUCT -->
					<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
						<img src="assets/images/monkey.jpg" alt="dog_food" class="p-4 w-full object-cover h-2/3">
						<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">Plyšová opica</h2>
						<p class="text-2xl pt-2 pl-4 font-bold text-white">10,99€</p>
						<a href="">
							<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
						</a>
					</div>	
					<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
						<img src="assets/images/bird_cage.jpg" alt="dog_food" class="p-4 w-full object-cover h-2/3">
						<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">Klietka</h2>
						<p class="text-2xl pt-2 pl-4 font-bold text-white">5,99€</p>
						<a href="">
							<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
						</a>
					</div>		
				</div>

			</div>
		</div>
	</section>
@endsection