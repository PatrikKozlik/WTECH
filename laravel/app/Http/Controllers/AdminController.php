<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_view() {
        
        if(Auth::user()->role_id == 4)
        {
            $products = Products::all();
            return view('admin_zone/admin_zone', ['products' => $products]);
        } 
        else
        {
            return redirect()->route('profile');
        }


    }


}
