<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
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
