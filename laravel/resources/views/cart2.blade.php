@extends('layouts.app')
 
@section('content')
<section class="mt-24 mb-24">
	<div class="flex justify-center">
		<div class="flex w-10/12 mb-4 place-items-center text-xl text-slate-500 font-bold uppercase">
			<p class="m-4">Košík</p>
			<i class="fa fa-arrow-right" aria-hidden="true"></i>
			<p class="m-4 text-slate-900">Doprava a platba</p>
			<i class="fa fa-arrow-right" aria-hidden="true"></i>
			<p class="m-4">Dodacie údaje</p>				
		</div>
	</div>


	<div class="flex justify-center ">
		<div class="bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500 w-11/12 md:w-10/12 p-4">
			<form id="delivery" method="POST" action="{{route('cart3')}}">
				@csrf
			</form>
			<div class="grid grid-cols-1 lg:grid-cols-3 gap-y-4 m-4 justify-center">
				<div class="flex flex-col w-full place-items-center">
					<div><h2 class="text-3xl w-11/12 text-white font-bold mb-4">Doprava</h2></div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_2")'>
						<input form="delivery" id="checkbox_2" type="checkbox" name="shipping" value="personally" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox_2" class="ml-2 text-sm font-medium">Osobne</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_3")'>
						<input form="delivery" id="checkbox_3" type="checkbox" name="shipping" value="courier" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox_3" class="ml-2 text-sm font-medium">Kuriér</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_4")'>
						<input form="delivery" id="checkbox_4" type="checkbox" name="shipping" value="delivery_cash" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox_4" class="ml-2 text-sm font-medium">Dobierka</label>
					</div>
				</div>
				
				<div class="flex flex-col  place-items-center">
					<div><h2 class="text-3xl w-11/12 text-white font-bold mb-4">Platba</h2></div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_5")'>
						<input form="delivery" id="checkbox_5" type="checkbox" name="payment" value="card" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox_5" class="ml-2 text-sm font-medium">Kartou online</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_6")'>
						<input form="delivery" id="checkbox_6" type="checkbox" name="payment" value="bank" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox_6" class="ml-2 text-sm font-medium">Prevodom</label>
					</div>
					
					<div class="bg-neutral-200 rounded-md p-2 w-2/3 m-2" onclick='check_checkbox("checkbox_7")'>
						<input form="delivery" id="checkbox_7" type="checkbox" name="payment" value="cash" class="w-4 h-4 text-amber-600 accent-amber-800 rounded">
						<label for="checkbox_7" class="ml-2 text-sm font-medium">V hotovosti</label>
					</div>

				</div>
				
				<div class="flex flex-col place-items-center">
					<div><h2 class="text-3xl w-11/12 text-white font-bold mb-4">Objednávka</h2></div>
					@foreach($products as $product)
						@php($path = public_path('images/'.$product->id))
						@php($files = \File::files($path))
						@php($firstImage = reset($files))
						<div class="flex w-full flex-wrap py-2 gap-2 place-items-center border-b-2">
							<div class=""><img src="{{ asset('images/'.$product->id.'/'.basename($firstImage)) }}" alt="" class="object-cover w-16 h-16 block"></div>
							<div class="flex-1"><h3 class="text-1xl text-white font-bold line-clamp-2">{{$product->product_name}}</h3></div>
							<div><p class="amounts text-xl font-semibold text-white">{{$product->amount}} ks</p></div>
							<div class="w-20"><p class="prices text-xl font-semibold text-right text-white">{{$product->price}}€</p></div>
						</div>
					@endforeach
					
				</div>
				
			</div>
			
			<div class="flex justify-end my-2">
				<p id="cart-sum" class="text-center text-2xl font-semibold text-white"></p>
			</div>
			
			<div>
				<a href="{{route('cart1')}}">
					<button type="button" class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
						<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
						Späť
					</button>
				</a>
				
				<button onclick="submit()" class="bg-green-500 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full float-right">
					Pokračovať
					<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</button>
			</div>
			
			
			
		</div>		

	</div>
	<!-- Modal content -->
	<div id="successModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="bg-stone-800/70 items-center justify-center fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal h-full hidden">
		<div class="relative w-full h-full max-w-2xl md:h-auto">
			<div class="relative bg-gradient-to-t to-amber-700 from-amber-500 rounded-lg shadow border-2 border-amber-500">
				<div class="flex items-start justify-between p-4 border-b-4 rounded-t border-white">
					<h3 class="text-xl font-semibold text-white">
						Vyberte všetky možnosti.
					</h3>
					<button onclick="document.getElementById('successModal').style.display='none'" class="text-white font-bold bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="staticModal">
						<i class="fa fa-times text-2xl" aria-hidden="true"></i> 
					</button>
				</div>
				<div class="p-6 space-y-6">
					<p class="leading-relaxed font-bold text-2xl text-center text-white">
						Vyberte spôsob dopravy aj spôsob platby.
					</p>
				</div>
				<div class="flex items-center p-6 space-x-2 border-t-4 border-gray-200 rounded-b">
					<button onclick="document.getElementById('successModal').style.display='none'" class="bg-stone-600 hover:bg-stone-400 hover:text-stone-600 text-white font-bold py-2 px-4 rounded-full">Zrušiť</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('additional_scripts')
	<script>
		var sum_el = document.getElementById("cart-sum");
		var prices = document.querySelectorAll('.prices');
		var amounts = document.querySelectorAll('.amounts');
		var sum = 0;

		for(var i = 0; i < prices.length; i ++){
			sum += parseFloat(prices[i].textContent.match(/[\d\.]+/)[0]) * parseFloat(amounts[i].textContent.match(/[\d\.]+/)[0]);
		}
		sum_el.innerHTML = "Spolu: "+sum.toFixed(2)+"€";
	</script>

	<!-- check/uncheck checkbox-->
	<script>
		var textinputs = document.querySelectorAll('input[type=checkbox]'); 
		var paymentinputs = document.querySelectorAll('input[name=payment]'); 
		var shippinginputs = document.querySelectorAll('input[name=shipping]');
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
			for(let j = 0; j < paymentinputs.length; j++){
				if(paymentinputs[j] == el && el.checked == false){
					for (let index = 0; index < paymentinputs.length; index++) {
						paymentinputs[index].checked = false;					
					}
					break;
				}
			}
			for(let j = 0; j < shippinginputs.length; j++){
				if(shippinginputs[j] == el && el.checked == false){
					for (let index = 0; index < shippinginputs.length; index++) {
						shippinginputs[index].checked = false;					
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
		
	<script>
		function submit(){
			var pass = 0;
			var paymentinputs = document.querySelectorAll('input[name=payment]'); 
			var shippinginputs = document.querySelectorAll('input[name=shipping]');
			for(var i = 0; i < paymentinputs.length; i++){
				if(paymentinputs[i].checked == true){
					pass++;
					break;
				}
			}
			for(var i = 0; i < shippinginputs.length; i++){
				if(shippinginputs[i].checked == true){
					pass++;
					break;
				}
			}
			if(pass == 2){
				const form = document.getElementById('delivery');
				form.submit();
			}else{
				model = document.getElementById('successModal');
				model.style.display='flex';
			}
		}
	</script>
@endsection