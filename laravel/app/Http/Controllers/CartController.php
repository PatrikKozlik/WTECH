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
        return view('cart3', ['need_address' => $need_address]);
    }

    
}
