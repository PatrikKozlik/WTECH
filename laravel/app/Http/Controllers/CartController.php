<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

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

    
}
