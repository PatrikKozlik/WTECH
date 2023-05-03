@extends('layouts.app')
 
@section('content')
<section class="mt-20 flex flex-col items-center justify-center">
	<x-auth-validation-errors class="mb-4 mt-4 text-center" :errors="$errors" />
	
	<div class=" max-w-2xl ">
		<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
			<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
				<h3 class="text-xl font-semibold text-white">
					Upraviť produkt
				</h3>
				
			</div>
			<div class="p-6 space-y-6">
				<p class="leading-relaxed font-bold text-2xl text-center text-white">
					ID produktu: {{$product->id}}
				</p>
				<form id="edit_pruduct_form" action="{{route('admin_edit_save')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" value="{{$product->id}}">

					<label for="product_name" class="text-white">Názov</label>
					<input form="edit_pruduct_form" type="text" name="product_name" value="{{$product->product_name}}" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="price" class="text-white">Cena</label>
					<input form="edit_pruduct_form" type="number" step="0.01" name="price" value="{{number_format(round($product->price, 2), 2)}}" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="number_of_products" class="text-white">Počet kusov</label>
					<input form="edit_pruduct_form" type="number" name="number_of_products" value="{{$product->number_of_products}}" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					
					<label for="category_id" class="text-white">Kategória</label>
					<select id="category_id" name="category_id" class="my-2 w-full h-10 rounded-md p-2 text-lg">
						@foreach($categories as $category)
							@if ($product->category_id == $category->id)
								<option value="{{$category->id}}" selected>{{$category->value}}</option>
							@else
								<option value="{{$category->id}}">{{$category->value}}</option>
							@endif
						@endforeach
					</select>

					<label for="supplier_id" class="text-white">Výrobca</label>
					<select id="supplier_id" name="supplier_id" class="my-2 w-full h-10 rounded-md p-2 text-lg">
						@foreach($suppliers as $supplier)
							@if ($product->supplier_id == $supplier->id)
								<option value="{{$supplier->id}}" selected>{{$supplier->value}}</option>
							@else
								<option value="{{$supplier->id}}">{{$supplier->value}}</option>
							@endif
						@endforeach
					</select>

					<label for="description" class="text-white">Popis</label>
					<textarea id="description" name="description" rows="4" class="my-2 w-full rounded-md p-2 text-lg">{{$product->details}}</textarea>

					<div class="flex items-center my-3 justify-center">
						<input form="edit_pruduct_form" id="available" name="available" type="checkbox" @if ($product->available) checked @endif value="1" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="available" class="ml-2 text-sm font-medium text-white">Dostupné</label>
					</div>

					<label for="files" class="text-white">Nahrať obrázky:</label>
    				<input type="file" id="files" name="files[]" multiple>
				</form>
			</div>
			<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
				<button form="edit_pruduct_form" type="submit" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Uložiť zmeny</button>
				<a href="{{route('admin')}}">
					<button class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Naspäť</button>
				</a>
				<a href="{{route('admin_delete_product', ['value' => $product->id])}}">
					<button class="float-right bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded-full">Odstrániť</button>
				</a>
			</div>
		</div>
	</div>
	
	<table class="max-w-2xl border-separate border border-slate-500 mx-auto mt-6 ml-2 mr-2 sm:ml-16 sm:mr-16">
		<thead class="bg-gradient-to-b to-amber-700 from-amber-400 text-white">
			<tr>
				<th class="border border-slate-600 p-2">Obrázok</th>
				<th class="border border-slate-600 p-2">Názov súboru</th>
				<th class="border border-slate-600 p-2">Odstrániť</th>
			</tr>
			</thead>
			<tbody>
				@foreach($files as $file)
				<tr>
					<td class="border border-slate-700 w-1/12 text-center py-1">
						<img src="/images/{{$product->id}}/{{$file->getFilename()}}" class="w-16 h-16">
					</td>
					<td class="border border-slate-700 w-1/12 text-center py-1">{{$file->getFilename()}}</td>
					<td class="border border-slate-700 w-1/12 text-center py-1 bg-red-100">
						<a href="{{route('admin_delete_file', ['value' => $product->id, 'filename' => $file->getFilename()])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
	</table>

</section>
@endsection
