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

class CartController extends Controller
{
    public function cart_add(Request $request){
        if (!session()->has('my_cart')) {
            session()->put('my_cart', []);
        }
        $cart = session()->get('my_cart',[]);
        $cart[] = [$request->id, $request->amount];
        session()->put('my_cart', $cart);

        $cartIds = array_column($cart, 0);
        $products = Products::whereIn('id', $cartIds)->get();

        foreach ($products as $product) {
            $cartItem = collect($cart)->firstWhere(0, $product->id);
            $product->amount = $cartItem[1];
        }
        
        return view('cart1', ['products' => $products]);
    }
    
    public function cart1_view(){
        return view('cart1');
    }

    public function cart2_view(){
        return view('cart2');
    }

    public function cart3_view(){
       return view('cart3');
    }

    public function save_product(Request $request){
        
        if(){

            $city = City::create([
                'value' => $request->city,
            ]);

            $street_n = Street_number::create([
                'value' => $street_nu,
                'city_id' => $city->id,
            ]);

            $street = Street::create([
                'value' => $street,
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

            
            $product_user = Product_user::create([
                'number_of_products' => ,
                'first_name' => ,
                'last_name' => ,
                'transport_type' => ,
                'payment_type' => ,
                'user_id' => ,
                'product_id' => ,
                'address_id' => $address->id,
            ]);

        }else{

            $product_user = Product_user::create([
                'number_of_products' => ,
                'transport_type' => ,
                'payment_type' => ,
                'user_id' => ,
                'product_id' => ,
            ]);

        }
        
        
        return view('/');
    }

    
}
