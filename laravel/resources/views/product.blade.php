@extends('layouts.app')
 
@section('content')
	@php($path = public_path('images/'.$product->id))
	@php($files = \File::files($path))
	@php($firstImage = reset($files))
	<section class="mt-24">
	<div class="flex justify-center ">
		<div class="bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-144 grid md:grid-cols-2 grid-cols-1">
			<img src="{{ asset('images/'.$product->id.'/'.basename($firstImage)) }}" alt="{{$product->product_name}}" class="p-4 w-full object-cover md:block hidden height_product">
			<div class="mt-4 relative">
				<h1 class="md:text-3xl text-xl w-11/12 pl-4 text-white font-bold line-clamp-2">{{$product->product_name}}</h1>
				<img src="assets/images/dog_food.jpg" alt="dog_food" class="p-4 w-full object-cover md:hidden h-60">
				<p class="md:text-3xl text-xl mt-6 pl-4 font-semibold text-white">{{$product->price}}€</p>
				<p class="text-white md:text-xl pl-4 mt-6 font-semibold">Dostupnosť: 
					@if ($product->number_of_products > 0) Na sklade
					@else Nedostupné
					@endif
				</p>
				<p class="text-white w-11/12 pl-4 mt-4 md:line-clamp-5 hidden">{{$product->details}}</p>
				<p class="text-white w-11/12 pl-4 mt-4 font-semibold">Na sklade: 
					@if ($product->number_of_products > 5) >5 ks
					@else {{$product->number_of_products}} ks
					@endif
				</p>
				@if($product->number_of_products > 0)
					<form action="{{route('addToCart')}}" method="POST">
						@csrf
						<input type="hidden" name="id" value="{{$product->id}}">
						<input type="number" name="amount" min="1" max="{{$product->number_of_products}}" class="w-16 bg-neutral-200 placeholder-gray-500 rounded-md px-2 left-6 bottom-20 absolute" value="1">
						<button type="submit" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full ml-4 mt-6 bottom-4 absolute">Kúpiť ></button>
					</form>
				@else
					<p class="text-white md:text-xl pl-4 mt-6 font-semibold">Produkt je momentálne nedostupný</p>
				@endif

			</div>
		</div>		
	</div>
	</section>
	<section class="mt-24">
	<div class="flex justify-center">
		<div class="grid-cols-3 grid w-10/12">
			<div class="col-span-2">
				<h2 class="text-3xl font-bold mb-6">Podrobnosti</h2>
				<p>{{$product->details}}</p>
			</div>
			<img src="{{ asset('images/'.$product->id.'/'.basename($firstImage)) }}" alt="dog_food" class="p-4 w-full object-cover h-72">
		</div>
	</div>

	@if(!empty($files_in_dir))
	<section class="mb-24">
		<!-- Gallery -->
		<div class="flex justify-center">
			<div class="w-10/12">
				<div class="grid lg:grid-cols-3 place-items-center md:place-items-start md:grid-cols-2 sm:grid-cols-1">
					<h2 class="lg:col-span-3 md:col-span-2 text-3xl font-bold">Galéria</h2>
					@foreach ($files_in_dir as $file)
						<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
							<img src="{{ asset('images/'.$product->id.'/'.basename($file)) }}" alt="gallery image" class="p-4 w-full object-cover h-full">
						</div>		
					@endforeach
				</div>

			</div>
		</div>
	</section>
	@endif
	

	</section>
	<section class="mb-24">
		<!-- Another products-->
		<div class="flex justify-center">
			<div class="w-10/12">
				<div class="grid lg:grid-cols-3 place-items-center md:place-items-start md:grid-cols-2 sm:grid-cols-1">
					<h2 class="lg:col-span-3 md:col-span-2 text-3xl font-bold">Podobné produkty</h2>
					@foreach ($recomend as $item)
						@php($path = public_path('images/'.$item->id))
						@php($files = \File::files($path))
						@php($firstImage = reset($files))
						<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
							<img src="{{ asset('images/'.$item->id.'/'.basename($firstImage)) }}" alt="{{$item->product_name}}" class="p-4 w-full object-cover h-2/3">
							<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">{{$item->product_name}}</h2>
							<p class="text-2xl pt-2 pl-4 font-bold text-white">{{$item->price}}€</p>
							<a href="{{ route('product', ['value' => $item->id]) }}">
								<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
							</a>
						</div>		
					@endforeach
				</div>

			</div>
		</div>
	</section>
@endsection