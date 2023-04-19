<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_view(){
        
        if(Auth::user()->role_id == 4)
        {
            return view('admin_zone/admin_zone');
        } 
        else
        {
            return view('profile');    
        }


    }
}
