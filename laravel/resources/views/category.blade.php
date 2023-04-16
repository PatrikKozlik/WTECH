@extends('layouts.app')
 
@section('content')
@php($i=4)
<section class="mt-24 mb-24">
	<h1 class="text-center text-3xl font-bold mb-8 lg:ml-17.5">{{$type}}</h1>
	<div class="flex justify-center">
		<div class="lg:hidden mt-6 w-10/12">
			<button id="filter_button" class="mt-2 bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full float-right">Filtrovať</button>
		</div>
	</div>
	<div class="flex justify-center">
		<div class="grid lg:grid-cols-4 grid-cols-3 w-10/12">
			<!-- FILTER -->
			<form id="search_form" action="{!! route('category', ['type' => $type]) !!}" method="GET">
				<x-auth-validation-errors class="mb-4 mt-4 text-center" :errors="$errors" />
				<div class="col-span-1 lg:block hidden">
					<h2 class="text-xl font-bold mb-6">Filter</h2>
					<p class="text-l mb-2">Cena</p>
					<div class="grid grid-cols-2 m-2 mb-6 w-2/3">
						<input from="search_form" type="number" name="low_price" value="{{$request != null ? $request->low_price : ''}}" class="w-16 bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" placeholder="Od">
						<input from="search_form" type="number" name="high_price" value="{{$request != null ? $request->high_price : ''}}" class="w-16 bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" placeholder="Do">
					</div>
					
					<!-- filter checkboxes -->
					<p class="text-l mb-2">Výrobca</p>
					<!-- one box-->
					@foreach ($categories as $item)
						<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
							<input from="search_form" type="checkbox" name="supplier[]" id="checkbox_{{$i}}" type="checkbox" value="{{$item}}" {{ !empty($request->supplier) && in_array($item, $request->supplier) ? 'checked' : '' }} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
							<label for="checkbox" class="ml-2 text-sm font-medium">{{$item}}</label>
						</div>
						@php($i++)
					@endforeach


					<p class="text-l mb-2">Dostpunosť</p>
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
						<input from="search_form" type="checkbox" name="available[]" id="checkbox_{{$i}}" type="checkbox" value="1" {{ !empty($request->available) && in_array("1", $request->available) ? 'checked' : '' }} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox" class="ml-2 text-sm font-medium">Na sklade</label>
					</div>
					@php($i++)
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
						<input from="search_form" type="checkbox" name="available[]" id="checkbox_{{$i}}" type="checkbox" value="0" {{ !empty($request->available) && in_array("0", $request->available) ? 'checked' : '' }} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox" class="ml-2 text-sm font-medium">Nedostupne</label>
					</div>
					@php($i++)

					<p class="text-l mb-2">Zoradenie</p>
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
						<input from="search_form" type="checkbox" name="order" id="checkbox_{{$i}}" type="checkbox" value="expensive" {{$request !=null && $request->order == "expensive" ? "checked" : ''}} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox" class="ml-2 text-sm font-medium">Najdrahšie</label>
					</div>
					@php($i++)
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
						<input from="search_form" type="checkbox" name="order" id="checkbox_{{$i}}" type="checkbox" value="cheap" {{$request !=null && $request->order == "cheap" ? "checked" : ''}} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox" class="ml-2 text-sm font-medium">Najlacnejšie</label>
					</div>
					@if($request->search != null)
						<input type="hidden" name="search" value="{{$request->search}}">
					@endif
					<button form="search_form" type="submit" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full mt-5">Vyhľadať ></button>
				</div>
			</form>
			
			<!-- SHOP PRODUCTS-->
			<div class="col-span-3 grid md:grid-cols-3 sm:grid-cols-1 place-items-center lg:place-items-start">
				@foreach ($products as $product)
					<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-80 transition duration-500 hover:scale-110">
						<img src="{{ asset('images/'.$product->id.'.jpg') }}" alt="{{$product->product_name}}" class="p-4 w-full object-cover h-3/5">
						<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">{{$product->product_name}} </h2>
						<p class="text-2xl pt-2 pl-4 font-bold text-white">{{$product->price}}€</p>
						<a href="{{ route('product', ['value' => $product->id]) }}">
							<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
						</a>
					</div>		
				@endforeach
				
			</div>
			<div></div>
			<div class="col-span-3 grid md:grid-cols-3 sm:grid-cols-1 place-items-center lg:place-items-start">
				@if($move[0] == 1)
					<button form="search_form" type="submit" name="page" value="{{$move[2]-1}}" class="w-2/3 md:block hidden">
						<i class="float-left fa-solid fa-arrow-left mt-8 fa-2x transition duration-500 hover:scale-110"></i>
					</button>
				@else
					<div></div>
				@endif
				<div class="w-2/3 content-center md:block hidden">
					<p class="mt-8 text-center">{{$move[2]}}</p>
				</div>
				@if($move[1] == 1)
					<button form="search_form" type="submit" name="page" value="{{$move[2]+1}}" class="w-2/3 md:block hidden">
						<i class="fa-solid fa-arrow-right float-right mt-8 fa-2x transition duration-500 hover:scale-110"></i>
					</button>
				@endif
			</div>
			
			<div class="md:hidden grid grid-cols-3 w-full col-span-3 place-items-center">
				<i class="float-left fa-solid fa-arrow-left mt-8 fa-2x transition duration-500 hover:scale-110 "></i>
				<p class="mt-8 text-center">1</p>
				<i class="fa-solid fa-arrow-right float-right mt-8 fa-2x transition duration-500 hover:scale-110"></i>
			</div>

			

		</div>
	</div>
</section>

	<!-- Modal content -->
	<div id="filterModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
		<div class="relative w-full h-full max-w-2xl lg:h-auto">
			<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
				<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
					<h3 class="text-xl font-semibold text-white">
						Filtrovať
					</h3>
					<button onclick="document.getElementById('filterModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
						<i class="fa fa-times text-2xl" aria-hidden="true"></i> 
					</button>
				</div>
				<form id="search_form_mobile" action="{!! route('category', ['type' => $type]) !!}" method="GET">
					@php($i++)
					<div class="p-6 space-y-6">
						<p class="text-l mb-2">Cena</p>
							<div class="grid grid-cols-2 m-2 mb-6 w-2/3">
								<input from="search_form_mobile" type="number" name="low_price" value="{{$request != null ? $request->low_price : ''}}" class="w-16 bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" placeholder="Od">
								<input from="search_form_mobile" type="number" name="high_price" value="{{$request != null ? $request->high_price : ''}}" class="w-16 bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 rounded-md px-2" type="text" placeholder="Do">
							</div>

							<!-- filter checkboxes -->
							<p class="text-l mb-2">Výrobca</p>
							@foreach ($categories as $item)
								<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
									<input from="search_form_mobile" type="checkbox" name="supplier[]" id="checkbox_{{$i}}" type="checkbox" value="{{$item}}" {{ !empty($request->supplier) && in_array($item, $request->supplier) ? 'checked' : '' }} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
									<label for="checkbox" class="ml-2 text-sm font-medium">{{$item}}</label>
								</div>
								@php($i++)
							@endforeach


							<p class="text-l mb-2">Dostpunosť</p>
							<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
								<input from="search_form_mobile" type="checkbox" name="available[]" id="checkbox_{{$i}}" type="checkbox" value="1" {{ !empty($request->available) && in_array("1", $request->available) ? 'checked' : '' }} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="checkbox" class="ml-2 text-sm font-medium">Na sklade</label>
							</div>
							@php($i++)
							<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
								<input from="search_form_mobile" type="checkbox" name="available[]" id="checkbox_{{$i}}" type="checkbox" value="0" {{ !empty($request->available) && in_array("0", $request->available) ? 'checked' : '' }} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="checkbox" class="ml-2 text-sm font-medium">Nedostupne</label>
							</div>
							@php($i++)
							
							<p class="text-l mb-2">Zoradenie</p>
							<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
								<input from="search_form_mobile" type="checkbox" name="order" id="checkbox_{{$i}}" type="checkbox" value="expensive" {{$request !=null && $request->order == "expensive" ? "checked" : ''}} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="checkbox" class="ml-2 text-sm font-medium">Najdrahšie</label>
							</div>
							@php($i++)
							<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_{{$i}}")'>
								<input from="search_form_mobile" type="checkbox" name="order" id="checkbox_{{$i}}" type="checkbox" value="cheap" {{$request !=null && $request->order == "cheap" ? "checked" : ''}} class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
								<label for="checkbox" class="ml-2 text-sm font-medium">Najlacnejšie</label>
							</div>
							@if($request->search != null)
								<input type="hidden" name="search" value="{{$request->search}}">
							@endif
					</div>
					<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b ">
						<button form="search_form_mobile" type="submit" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Vyhľadať</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('additional_scripts')
	<script>
		const filter = document.querySelector("#filter_button");
		const modal = document.querySelector("#filterModal");
		
		filter.addEventListener("click", () => {
			modal.style.display = "flex";
		});
		addEventListener("resize", (event) => {
			modal.style.display = "none";
		});
	</script>

	<!-- check/uncheck checkbox-->
	<script>
		var textinputs = document.querySelectorAll('input[type=checkbox]'); 
		var orderinputs = document.querySelectorAll('input[name=order]'); 
		for(var i = 0; i < textinputs.length; i++){
			textinputs[i].onclick = function() { 
				if(this.checked == true){
					this.checked = false;     
				}else{
					this.checked = true; 
				}
				
			};
		}
		function check_checkbox(element_id){
			var el = document.getElementById(element_id);
			for(let j = 0; j < orderinputs.length; j++){
				if(orderinputs[j] == el && el.checked == false){
					for (let index = 0; index < orderinputs.length; index++) {
						orderinputs[index].checked = false;					
					}
					break;
				}
			}
			if(el.checked == true){
				el.checked = false;
			}
			else el.checked = true;
		}
	</script>
@endsection