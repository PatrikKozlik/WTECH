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

    @if(session('success'))
        <!-- Modal content -->
        <div id="successModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 flex items-center justify-center fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
                <div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
                    <div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
                        <h3 class="text-xl font-semibold text-white">
                            Objednanie
                        </h3>
                        <button onclick="document.getElementById('successModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
                            <i class="fa fa-times text-2xl" aria-hidden="true"></i> 
                        </button>
                    </div>
                    <div class="p-6 space-y-6">
                        <p class="leading-relaxed font-bold text-2xl text-center text-white">
                            Objednanie bolo úspešné
                        </p>
                    </div>
                    <div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
                        <button onclick="document.getElementById('successModal').style.display='none'" class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Zrušiť</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection


@section('additional_scripts')
<!-- Dynamic change of search bar -->
<script>
    const searchBar = document.querySelector("#search");
    const changeText = setInterval(changeIt, 2500);
    const words = ["Domček pre včely", "Dobrota pre psa", "Klietka pre vtáčika", "Granule", "Obilie pre ovce"];
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