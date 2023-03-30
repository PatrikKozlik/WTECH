<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;



class LoginController extends Controller
{
    
    public function login_view(){

        $users = Address::select('p.id', 'p.value as psc', 'user_id', 's.value as street' )
                            ->join('postal_code as p', 'p.id', '=', 'address.postalcode_id')
                            ->join('street as s', 's.id', '=', 'p.id')
                            ->get();

        return view('login/login', ['users' => $users]);
    }

    public function register_view(){
        return view('login/registration');
    }

}
