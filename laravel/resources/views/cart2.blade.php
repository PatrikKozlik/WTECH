@extends('layouts.app')
 
@section('content')
<section class="mt-24 mb-24">
	<div class="flex justify-center">
		<div class="flex w-10/12 mb-4 place-items-center text-xl text-slate-500 font-bold uppercase">
			<p class="m-4">Košík</p>
			<i class="fa fa-arrow-right" aria-hidden="true"></i>
			<p class="m-4 text-slate-900">Doprava a platba</p>
			<i class="fa fa-arrow-right" aria-hidden="true"></i>
			<p class="m-4">Dodacie údaje</p>				
		</div>
	</div>


	<div class="flex justify-center ">
		<div class="bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 w-11/12 md:w-10/12 p-4">
			
			<div class="grid grid-cols-1 lg:grid-cols-3 gap-y-4 m-4 justify-center">
				<div class="flex flex-col w-full place-items-center">
					<div><h1 class="text-3xl w-11/12 text-white font-bold mb-4">Doprava</h1></div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2">
						<input id="shippng-1" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="shippng-1" class="ml-2 text-sm font-medium">Zásielkovňa</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" >
						<input id="shippng-2" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="shippng-2" class="ml-2 text-sm font-medium">Osobne</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" >
						<input id="shippng-3" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="shippng-3" class="ml-2 text-sm font-medium">Kuriér</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" >
						<input id="shippng-4" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="shippng-4" class="ml-2 text-sm font-medium">Dobierka</label>
					</div>
				</div>
				
				<div class="flex flex-col  place-items-center">
					<div><h1 class="text-3xl w-11/12 text-white font-bold mb-4">Platba</h1></div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2">
						<input id="payment-1" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="payment-1" class="ml-2 text-sm font-medium">Kartou online</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" >
						<input id="payment-2" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="payment-2" class="ml-2 text-sm font-medium">Prevodom</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" >
						<input id="payment-3" type="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="payment-3" class="ml-2 text-sm font-medium">V hotovosti</label>
					</div>

				</div>
				
				<div class="flex flex-col place-items-center">
					<div><h1 class="text-3xl w-11/12 text-white font-bold mb-4">Objednávka</h1></div>

					<div class="flex w-full flex-wrap py-2 gap-2 place-items-center border-b-2">
						<div class=""><img src="assets/images/dog_food.jpg" alt="" class="object-cover w-16 h-16 block"></div>
						<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">Dog Fantasy miska ťažká 13,7 cm 0,55 l nerez</h1></div>
						<div><p class="text-xl font-semibold text-white">1 ks</p></div>
						<div class="w-20"><p class="text-xl font-semibold text-right text-white">2,99€</p></div>
					</div>
					
					<div class="flex w-full flex-wrap py-2 gap-2 place-items-center border-b-2">
						<div class=""><img src="assets/images/monkey.jpg" alt="" class="object-cover w-16 h-16 block"></div>
						<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">Plyšová opica</h1></div>
						<div><p class="text-xl font-semibold text-white">1 ks</p></div>
						<div class="w-20"><p class="text-xl font-semibold text-right text-white">10,99€</p></div>
					</div>
					
					<div class="flex w-full flex-wrap py-2 gap-2 place-items-center border-b-2">
						<div class=""><img src="assets/images/bird_cage.jpg" alt="" class="object-cover w-16 h-16 block"></div>
						<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">Klietka</h1></div>
						<div><p class="text-xl font-semibold text-white">1 ks</p></div>
						<div class="w-20"><p class="text-xl font-semibold text-right text-white">5,99€</p></div>
					</div>
					
				</div>
				
			</div>
			
			<div class="flex justify-end my-2">
				<p class="text-center text-2xl font-semibold text-white">Spolu: 19,97€</p>
			</div>
			
			<div>
				<a href="cart1.html">
					<button type="button" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
						<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
						Späť
					</button>
				</a>
				
				<a href="cart3.html">
					<button type="submit" class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full float-right">
						Pokračovať
						<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
					</button>
				</a>
			</div>
			
			
			
		</div>		

	</div>
</section>
@endsection