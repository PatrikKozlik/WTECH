@extends('layouts.app')
 
@section('content')
<section class="mt-20">
	<h1 class="text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-amber-700 from-amber-300">Detajly</span> o produktoch</h1>

	<!-- <div class="flex justify-center my-3">
		<button class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full" onclick="document.getElementById('addModal').style.display='flex'">
			Pridať produkt
		</button>
	</div> -->

	<div class="flex justify-center my-3">
		<a href="{{route('admin_create_product_view')}}">
			<button class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Pridať produkt</button>
		</a>
	</div>

	<table class="border-separate border border-slate-500 mx-auto mt-6 ml-2 mr-2 sm:ml-16 sm:mr-16">
		<thead class="bg-gradient-to-b to-amber-700 from-amber-400 text-white">
		<tr>
			<th class="border border-slate-600 p-2">ID produktu</th>
			<th class="border border-slate-600 p-2">Názov</th>
			<th class="border border-slate-600 p-2">Cena</th>
			<th class="border border-slate-600 p-2">Počet kusov</th>
			<th class="border border-slate-600 p-2">Úpravy</th>
		</tr>
		</thead>
		<tbody>
		@foreach($products as $product)
		<tr>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->id}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->product_name}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{number_format(round($product->price, 2), 2)}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->number_of_products}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1 bg-green-100"><a href="/admin/edit/{{$product->id}}"><div class="w-full"><i class="fa fa-pencil" aria-hidden="true"></i></div></a></td>
		</tr>
		@endforeach
		</tbody>
	</table>

</section>


<!-- Modal content -->
<div id="editModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal h-full">
	<div class="relative w-full h-full max-w-2xl md:h-auto">
		<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
			<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
				<h3 class="text-xl font-semibold text-white">
					Upraviť produkt
				</h3>
				<button onclick="document.getElementById('editModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
					<i class="fa fa-times text-2xl" aria-hidden="true"></i> 
				</button>
			</div>
			<div class="p-6 space-y-6">
				<p class="leading-relaxed font-bold text-2xl text-center text-white">
					ID produktu
				</p>
				<form id="edit_pruduct_form" action="">
					<label for="name">Názov</label>
					<input form="edit_pruduct_form" type="text" name="name" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="price">Cena</label>
					<input form="edit_pruduct_form" type="number" name="price" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="number_of_products">Počet kusov</label>
					<input form="edit_pruduct_form" type="number" name="number_of_products" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<div class="flex items-center my-3 justify-center">
						<input form="edit_pruduct_form" id="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox" class="ml-2 text-sm font-medium text-amber-900">Dostupné</label>
					</div>	
				</form>
			</div>
			<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
				<button form="edit_pruduct_form" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Uložiť zmeny</button>
				<button onclick="document.getElementById('editModal').style.display='none'" class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Zrušiť</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal content add product -->
<!-- <div id="addModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 items-center justify-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal h-full">
	<div class="relative w-full h-full max-w-2xl md:h-auto">
		<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
			<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
				<h3 class="text-xl font-semibold text-white">
					Pridať prdukt
				</h3>
				<button onclick="document.getElementById('addModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
					<i class="fa fa-times text-2xl" aria-hidden="true"></i> 
				</button>
			</div>
			<div class="p-6 space-y-6">
				<p class="leading-relaxed font-bold text-2xl text-center text-white">
					ID produktu
				</p>
				<form id="edit_pruduct_form" action="">
					<label for="name">Názov</label>
					<input form="edit_pruduct_form" type="text" name="name" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="price">Cena</label>
					<input form="edit_pruduct_form" type="number" name="price" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<label for="number_of_products">Počet kusov</label>
					<input form="edit_pruduct_form" type="number" name="number_of_products" class="my-2 w-full h-10 rounded-md p-2 text-lg" required>
					<div class="flex items-center my-3 justify-center">
						<input form="edit_pruduct_form" id="checkbox" type="checkbox" value="" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox" class="ml-2 text-sm font-medium text-amber-900">Dostupné</label>
					</div>	
				</form>
			</div>
			<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
				<button form="edit_pruduct_form" class="bg-green-500 hover:bg-green-300 hover:text-green-500 text-white font-bold py-2 px-4 rounded-full">Uložiť zmeny</button>
				<button onclick="document.getElementById('addModal').style.display='none'" class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Zrušiť</button>
			</div>
		</div>
	</div>
</div> -->

@endsection