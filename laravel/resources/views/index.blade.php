<!DOCTYPE html>
<html lang="sk">

	<head>
		<title>Pet Shop</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta name="description" content="Internetový obchod s potrebami pre zvieratá">
		<meta name="keywords" content="eshop, pets, food, toys, accessorities, dog, cat">
		<meta http-equiv='content-language' content='sk-sk'>
		
		<!-- CSS stylesheets -->
		<link href="{{ asset('css/output.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	</head>
	<body>
		
		{{-- Header --}}
		@include('layouts/header')

		<section class="mt-24">
			<form action="">
				<div class="flex justify-center lg:mt-14 sm:mt-6">
					<svg class="w-8 mr-4 float-left" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
					<form id="word_search_form"action="">
						<input form="word_search_form"id="search" type="text" name="search" class="my-2 bg-neutral-200 placeholder-gray-500 placeholder-opacity-100 w-6/12 h-10 rounded-md p-2 text-lg" placeholder="">
					</form>
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
						<!-- ONE PRODUCT -->
						<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
							<img src="{{ asset('images/dog_food.jpg') }}" alt="dog_food" class="p-4 w-full object-cover h-2/3">
							<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">Dog Fantasy miska ťažká 13,7 cm 0,55 l nerez </h2>
							<p class="text-2xl pt-2 pl-4 font-bold text-white">2,99€</p>
							<a href="">
								<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
							</a>
						</div>		
						<!-- END OF ONE PRODUCT -->
						<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
							<img src="{{ asset('images/monkey.jpg') }}" alt="dog_food" class="p-4 w-full object-cover h-2/3">
							<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">Plyšová opica</h2>
							<p class="text-2xl pt-2 pl-4 font-bold text-white">10,99€</p>
							<a href="">
								<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
							</a>
						</div>	
						<div class="mt-6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 md:w-10/12 w-2/3 h-96 transition duration-500 hover:scale-110">
							<img src="{{ asset('images/bird_cage.jpg') }}" alt="dog_food" class="p-4 w-full object-cover h-2/3">
							<h2 class="text-l w-11/12 pl-4 text-ellipsis overflow-hidden whitespace-nowrap text-white">Klietka</h2>
							<p class="text-2xl pt-2 pl-4 font-bold text-white">5,99€</p>
							<a href="">
								<button class="mt-2 ml-3 bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">Kúpiť ></button>
							</a>
						</div>		
					</div>

				</div>
			</div>
			
		</section>
		
		{{-- Footer --}}
		@include('layouts/footer')

	</body>

	<!-- JS Scripts -->
	<!-- Fafa icons -->
	<script src="https://kit.fontawesome.com/1d5e2079b1.js" crossorigin="anonymous"></script>

	<!-- Mobile, button -->
	<script>
		const btn = document.querySelector("button.mobile-menu-button");
		const menu = document.querySelector(".mobile-menu");
		
		btn.addEventListener("click", () => {
		menu.classList.toggle("hidden");
		});
	</script>

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

</html>