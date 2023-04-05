<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\City;
use App\Models\Postal_code;
use App\Models\Street_number;
use App\Models\Street;



class VoluntaryRegistrationController extends Controller
{
    
    public function create()
    {
        return view('auth.voluntary_registration');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:25'],
        //     'surname' => ['required', 'string', 'max:25'],
        //     'street' => ['required', 'string', 'max:45'],
        //     'city' => ['required', 'string', 'max:25'],
        //     'postcode' => ['required', 'string', 'max:25'],
        //     'phone_number' => ['required', 'string', 'max:20'],
        // ]);

        // $adress = 
        // Address::select('phone', 'first_name', 'last_name')
        //         ->where('email', Auth::user()->email)
        //         ->update([ 'phone' => $request->phone_number ]);

        User::where('email', Auth::user()->email)
            ->update([
                'phone' => $request->phone_number
                ]);

        // event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

}
