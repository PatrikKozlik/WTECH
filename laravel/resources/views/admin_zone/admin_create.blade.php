@extends('layouts.app')
 
@section('content')
<section class="mt-20 flex flex-col items-center justify-center">
	<x-auth-validation-errors class="mb-4 mt-4 text-center" :errors="$errors" />
	
	<div class=" max-w-2xl ">
		<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
			<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
				<h3 class="text-xl font-semibold text-white">
					Pridať nový produkt
				</h3>
				
			</div>
			<div class="p-6 space-y-6">
				<form id="edit_pruduct_form" action="{{route('admin_create_product_save')}}" method="POST" enctype="multipart/form-data">
					@csrf

					<label for="product_name" class="text-white">Názov</label>
					<input form="edit_pruduct_form" type="text" name="product_name"  class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="price" class="text-white">Cena</label>
					<input form="edit_pruduct_form" type="number" step="0.01" name="price"  class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="number_of_products" class="text-white">Počet kusov</label>
					<input form="edit_pruduct_form" type="number" name="number_of_products"  class="my-2 w-full h-10 rounded-md p-2 text-lg" required>

					<label for="category_id" class="text-white">Kategória</label>
					<select id="category_id" name="category_id" class="my-2 w-full h-10 rounded-md p-2 text-lg">
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->value}}</option>
						@endforeach
					</select>

					<label for="supplier_id" class="text-white">Výrobca</label>
					<select id="supplier_id" name="supplier_id" class="my-2 w-full h-10 rounded-md p-2 text-lg">
						@foreach($suppliers as $supplier)
							<option value="{{$supplier->id}}">{{$supplier->value}}</option>
						@endforeach
					</select>

					<label for="description" class="text-white">Popis</label>
					<textarea id="description" name="description" rows="4" class="my-2 w-full rounded-md p-2 text-lg"></textarea>


					<div class="flex items-center my-3 justify-center">
						<input form="edit_pruduct_form" id="available" name="available" type="checkbox"  value="1" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="available" class="ml-2 text-sm font-medium text-white">Dostupné</label>
					</div>

					<label for="files" class="text-white">Nahrať obrázky:</label>
    				<input type="file" id="files" name="files[]" multiple>
				</form>
			</div>
			<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
				<button form="edit_pruduct_form" type="submit" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Uložiť</button>
				<a href="{{route('admin')}}">
					<button class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Naspäť</button>
				</a>
			</div>
		</div>
	</div>
	

</section>

@endsection