@extends('layouts.app')
 
@section('content')
<section class="mt-20">
	<h1 class="text-3xl font-extrabold text-center"><span class="text-transparent bg-clip-text bg-gradient-to-r to-amber-700 from-amber-300">Detajly</span> o objednávkach</h1>

	<table class="border-separate border border-slate-500 mx-auto mt-6 ml-2 mr-2 sm:ml-16 sm:mr-16">
		<thead class="bg-gradient-to-b to-amber-700 from-amber-400 text-white">
		<tr>
			<th class="border border-slate-600 p-2">ID produktu</th>
            <th class="border border-slate-600 p-2">Číslo objednávky</th>
			<th class="border border-slate-600 p-2">Názov</th>
			<th class="border border-slate-600 p-2">Cena</th>
			<th class="border border-slate-600 p-2">Počet kusov</th>
            <th class="border border-slate-600 p-2">Dátum objednania</th>
		</tr>
		</thead>
		<tbody>
            {{-- {{dd($products)}} --}}
        @if(count($products) == 0)
            <td colspan="6" class="border border-slate-700 w-1/12 text-center py-1">Žiadna vytvorená objednávka</td>
        @endif

        @foreach ($products as $product)
            <tr>
                <td class="border border-slate-700 w-1/12 text-center py-1">{{ $product->id }}</td>
                <td class="border border-slate-700 w-1/12 text-center py-1">{{ $product->order_code }}</td>
                <td class="border border-slate-700 w-1/12 text-center py-1">{{ $product->name }}</td>
                <td class="border border-slate-700 w-1/12 text-center py-1">{{ $product->price*$product->amount }}</td>
                <td class="border border-slate-700 w-1/12 text-center py-1">{{ $product->amount }}</td>
                <td class="border border-slate-700 w-1/12 text-center py-1">{{ $product->date }}</td>
            </tr>
        @endforeach
		</tbody>
	</table>

</section>

@endsection