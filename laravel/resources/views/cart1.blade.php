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
			<form id="sumary" action="{{route('cart2')}}" METHOD="POST">
				@csrf
			</form>
			@foreach($products as $product)
				@php($path = public_path('images/'.$product->id))
				@php($files = \File::files($path))
				@php($firstImage = reset($files))
				<div class="flex flex-wrap py-2 gap-4 place-items-center border-b-2">
					<div class=""><img src="{{ asset('images/'.$product->id.'/'.basename($firstImage)) }}" alt="{{$product->product_name}}" class="object-cover w-20 h-20 block"></div>
					<div class="flex-1"><h1 class="text-1xl text-white font-bold line-clamp-2">{{$product->product_name}}</h1></div>
					
					<div class="flex flex-nowrap gap-4 place-items-center">
						<input form="sumary" type="hidden" name="id[]" value="{{$product->id}}">
						<input form="sumary" type="number" name="amount[]" min="1" max="{{$product->number_of_products}}" value="{{$product->amount}}" class="amounts w-16 h-8 bg-neutral-200 placeholder-gray-500 rounded-md px-2">
						
						<div class="w-20"><p class="prices text-xl font-semibold text-right text-white">{{$product->price}}€</p></div>
						<div class="">
							<form id="delete_{{$product->id}}" action="{{route('remove_from_cart')}}" method="POST">
								@csrf
								<input form="delete_{{$product->id}}" type="hidden" name="remove" value="{{$product->id}}">
								<button form="delete_{{$product->id}}" type="submit" class="bg-amber-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold h-8 w-8 rounded-full">
									<i class="fa-solid fa-x"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			@endforeach
		

			<div class="flex justify-end py-2">
				<p id="cart-sum" class="text-2xl font-semibold text-white">	</p>
			</div>
			
			<div class="flex justify-end">
				<button type="submit" form="sumary" class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
					Pokračovať
					<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</button>
			</div>
			
		</div>		

	</div>
</section>
@endsection

@section('additional_scripts')
	<script>
		var sum_el = document.getElementById("cart-sum");
		var prices = document.querySelectorAll('.prices');
		var amounts = document.querySelectorAll('.amounts');
		var sum = 0;

		for(var i = 0; i < prices.length; i ++){
			sum += parseFloat(prices[i].textContent.match(/[\d\.]+/)[0]) * parseFloat(amounts[i].value);
		}
		sum_el.innerHTML = "Spolu: "+sum.toFixed(2)+"€";
	</script>
@endsection