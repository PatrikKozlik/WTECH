@extends('layouts.app')
 
@section('content')
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
			@foreach($products as $product)
				<div class="flex flex-wrap py-2 gap-4 place-items-center border-b-2">
					<div class=""><img src="{{ asset('images/'.$product->id.'.jpg') }}" alt="{{$product->product_name}}" class="object-cover w-20 h-20 block"></div>
					<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">{{$product->product_name}}</h1></div>
					
					<div class="flex flex-nowrap gap-4 place-items-center">
						<div class="">
							<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
								<i class="fa-solid fa-minus"></i>
							</button>
						</div>
					
						<input from="search_form" type="number" name="high_price" class="w-16 h-8 bg-neutral-200 placeholder-gray-500 rounded-md px-2" type="text" value="{{$product->amount}}">
						
						<div class="">
							<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-6 w-6 rounded-full">
								<i class="fa-solid fa-plus"></i>
							</button>
						</div>
						
						<div class="w-20"><p class="text-xl font-semibold text-right text-white">{{$product->price}}€</p></div>
						<div class="">
							<button class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-8 w-8 rounded-full">
								<i class="fa-solid fa-x"></i>
							</button>
						</div>
					</div>
				</div>
			@endforeach

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
@endsection