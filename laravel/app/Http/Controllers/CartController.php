<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Address;
use App\Models\City;
use App\Models\Postal_code;
use App\Models\Street_number;
use App\Models\Street;
use App\Models\Product_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart_add(Request $request){
        if (!session()->has('my_cart')) {
            session()->put('my_cart', []);
        }
        $match = 0;

        $cart = session()->get('my_cart', []);
        for ($i=0; $i < count($cart); $i++) { 
            if($cart[$i][0] == $request->id){
                $cart[$i][1] = $request->amount;
                $match = 1;
            }
        }

        if ($match == 0) {
            $cart = session()->get('my_cart',[]);
            $cart[] = [$request->id, $request->amount];
            session()->put('my_cart', $cart);
        }else{
            session()->put('my_cart', $cart);
        }

        return redirect()->route('cart1');
    }

    public function cart_remove(Request $request){
        $cart = session()->get('my_cart',[]);
        
        foreach ($cart as $key => $product) {
            if ($product[0] == $request->remove) {
                unset($cart[$key]);
                break;
            } 
        }
        session()->put('my_cart', $cart);
        return redirect()->route('cart1');
    }
    
    public function cart1_view(){
        $cart = session()->get('my_cart',[]);
        $cartIds = array_column($cart, 0);
        $products = Products::whereIn('id', $cartIds)->get();

        foreach ($products as $product) {
            $cartItem = collect($cart)->firstWhere(0, $product->id);
            $product->amount = $cartItem[1];
        }

        return view('cart1', ['products' => $products]);
    }

    public function cart2_view(Request $request){
        $cart = session()->get('my_cart',[]);
        if(count($cart) == 0){
            return redirect()->route('cart1');
        }
        //check values and rewrite them in session
        for ($i= 0; $i < count($request->id); $i++) {
            foreach ($cart as $key => $cartItem) {
                if($cartItem[0] == $request->id[$i]){
                    $cart[$key][1] = $request->amount[$i];
                    break;
                }
            }
        }
        session()->put('my_cart', $cart);
        $cartIds = array_column($cart, 0);
        $products = Products::whereIn('id', $cartIds)->get();

        foreach ($products as $product) {
            $cartItem = collect($cart)->firstWhere(0, $product->id);
            $product->amount = $cartItem[1];
        }


        return view('cart2', ['products' => $products]);
    }

    public function cart3_view(Request $request){
        $request->validate([
            'shipping' => 'required',
            'payment' => 'required',
        ]);
        session()->put('shipping', $request->shipping);
        session()->put('payment', $request->payment);
        $need_address = 0;
        if($request->shipping == 'delivery_cash' || $request->shipping == 'mailroom'){
            $need_address = 1;
        }
        $user = null;
        if(auth()->check()){
            $user = User::where('email', Auth::user()->email)->first();
        }
        return view('cart3', ['need_address' => $need_address, 'user' => $user]);
    }

    public function save_product(Request $request){
        
        $city = City::create([
            'value' => $request->city,
        ]);

        $street_n = Street_number::create([
            'value' => $request->street_num,
            'city_id' => $city->id,
        ]);

        $street = Street::create([
            'value' => $request->street,
            'street_number_id' => $street_n->id,
        ]);
        
        $postalCode = Postal_code::create([
            'value' => $request->postcode,
            'street_id' => $street->id,
        ]);
        
        $address = Address::create([
            'postalcode_id' => $postalCode->id,
            'state_id' => 1,
        ]);

        # Check order number
        $order_number = Product_user::max('order_code');
        if ($order_number == null){
            $order_number = 1;
        }else{
            $order_number++;
        }

        # Descrease number of product in storage
        foreach(session()->get('my_cart',[]) as $product){
            $product_in_store = Products::find($product[0]);
            $amount = $product_in_store->number_of_products;
            $product_in_store->number_of_products = $amount - $product[1];
            $product_in_store->save();
        }

        foreach(session()->get('my_cart',[]) as $product){
            $product_user = Product_user::create([
                'number_of_products' => $product[1],
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'order_code' => $order_number,
                'transport_type' => session()->get('shipping'),
                'payment_type' => session()->get('payment'),
                'product_id' => $product[0],
                'address_id' => $address->id,
            ]);
        }
        Session::forget('my_cart');
        return redirect()->route('index')->with('success', 'Action was successful!');
    }

    public function save_registred(){

        # Check order number
        $order_number = Product_user::max('order_code');
        if ($order_number == null){
            $order_number = 1;
        }else{
            $order_number++;
        }

        # Descrease number of product in storage
        foreach(session()->get('my_cart',[]) as $product){
            $product_in_store = Products::find($product[0]);
            $amount = $product_in_store->number_of_products;
            $product_in_store->number_of_products = $amount - $product[1];
            $product_in_store->save();
        }

        foreach(session()->get('my_cart',[]) as $product){
            $product_user = Product_user::create([
                'number_of_products' => $product[1],
                'transport_type' => session()->get('shipping'),
                'order_code' => $order_number,
                'payment_type' => session()->get('payment'),
                'user_id' => Auth::user()->id,
                'product_id' => $product[0],
            ]);
        }
        Session::forget('my_cart');
        return redirect()->route('index')->with('success', 'Action was successful!');
        
    }
        
            

        
        
        
        

    
}
