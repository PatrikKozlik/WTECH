@extends('layouts.app')
 
@section('content')
<section class="mt-24 mb-24">
	<form id="word_search_form" action="{{route('category', ['type' => 'Vyhľadanie'])}}" method="GET">
		<div class="flex justify-center lg:mt-14 sm:mt-6">
			<button form="word_search_form" type="submit">
				<svg class="w-8 mr-4 float-left" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<path d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</button>
			<input form="word_search_form"id="search" type="text" name="search" class="my-2 bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 w-6/12 h-10 rounded-md p-2 text-lg" placeholder="" required>
		</div>
	</form>
	<div class="flex justify-center mb-6">
		<div class="w-10/12">
			<h1 class="md:text-left text-center float-left text-3xl font-bold mt-24 w-full">ODPORÚČANÉ PRODUKTY</h1>
		</div>
	</div>
	<div class="flex justify-center mb-10">
		<div class="w-10/12">
			<div class="grid lg:grid-cols-3 place-items-center md:place-items-start md:grid-cols-2 sm:grid-cols-1">
				@foreach ($recomend as $item)
					<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
						<img src="{{ asset('images/'.$item->id.'.jpg') }}" alt="{{$item->product_name}}" class="p-4 w-full object-cover h-2/3">
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


@section('additional_scripts')
<!-- Dynamic change of search bar -->
<script>
    const searchBar = document.querySelector("#search");
    const changeText = setInterval(changeIt, 2500);
    const words = ["Plyšová opica", "Potrava pre psa", "Klietka pre vtáčika", "Granule pre mačky", "Kolotoč pre škrečka"];
    var remove = false;
    var index = 0;

    function changeIt(){
        var changeOneLetter = setInterval(function(){
            if(remove == false && returnCorrectLetter(searchBar.placeholder) != '000'){
                searchBar.placeholder += returnCorrectLetter(searchBar.placeholder);  
            }
            else if(remove == true){
                searchBar.placeholder = searchBar.placeholder.substring(0,searchBar.placeholder.length-1);
                if(searchBar.placeholder == ''){
                    changeIndex();
                    clearInterval(changeOneLetter);
                }
            }
            else{
                changeIndex();
                clearInterval(changeOneLetter);
            }
        }, 100);
    }

    function returnCorrectLetter(str){
        var indexLetter = words.indexOf(str) + str.length + 1;
        if(words[index].length > indexLetter){
            return words[index][indexLetter]
        }
        else return '000';

    }

    function changeIndex(){
        index++;
        if(index > words.length-1){
            index = 0;
        }
        if(remove == false) remove = true;
        else remove = false;
    }
</script>
@endsection