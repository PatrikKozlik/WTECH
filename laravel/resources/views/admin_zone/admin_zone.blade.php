@extends('layouts.app')
 
@section('content')
<section class="mt-20">
	<h1 class="text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-amber-700 from-amber-300">Detajly</span> o produktoch</h1>

	<div class="flex justify-center my-4">
		<a href="{{route('admin_create_product_view')}}">
			<button class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Pridať produkt</button>
		</a>
	</div>

	<table class="border-separate border border-slate-500 mx-auto mt-6 mb-6 ml-2 mr-2 sm:ml-16 sm:mr-16">
		<thead class="bg-gradient-to-b to-amber-700 from-amber-400 text-white">
		<tr>
			<th class="border border-slate-600 p-2">ID produktu</th>
			<th class="border border-slate-600 p-2">Názov</th>
			<th class="border border-slate-600 p-2">Cena</th>
			<th class="border border-slate-600 p-2">Počet kusov</th>
			<th class="border border-slate-600 p-2">Kategória</th>
			<th class="border border-slate-600 p-2">Výrobca</th>
			<th class="border border-slate-600 p-2">Úpravy</th>
		</tr>
		</thead>
		<tbody>
		@foreach($products as $product)
		<tr>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->id}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->product_name}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{number_format(round($product->price, 2), 2)}} €</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->number_of_products}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->category->value}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1">{{$product->supplier->value}}</td>
			<td class="border border-slate-700 w-1/12 text-center py-1 bg-green-100"><a href="/admin/edit/{{$product->id}}"><div class="w-full"><i class="fa fa-pencil" aria-hidden="true"></i></div></a></td>
		</tr>
		@endforeach
		</tbody>
	</table>

</section>

@endsection