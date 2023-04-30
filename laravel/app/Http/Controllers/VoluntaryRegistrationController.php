<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

        $request->validate([
            'phone_number' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:25'],
            'surname' => ['required', 'string', 'max:25'],
            'street' => ['required', 'string', 'max:56'],
            'postcode' => ['required', 'string', 'max:25'],
            'city' => ['required', 'string', 'max:25'],
        ]);

        $user = User::where('email', Auth::user()->email)->first();
        $user->phone = $request->phone_number;
        $user->first_name = $request->name;
        $user->last_name = $request->surname;
        $user->save();
        
        $street = $request->street; 
        $street_nu =  $request->street_n; 

        $add = Address::join('postal_code as p', 'p.id', '=', 'address.postalcode_id')
                        ->join('street as s', 's.id', '=', 'p.street_id')
                        ->join('street_number as sn', 'sn.id', '=', 's.street_number_id')
                        ->join('city as c', 'c.id', '=', 'sn.city_id')
                        ->where([
                            ['p.value', '=', $request->postcode],
                            ['s.value', '=', $street],
                            ['sn.value', '=', $street_nu],
                            ['c.value', '=', $request->city],
                            
                        ])
                        ->first();
        
        if (empty($add)) {

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
                'user_id' => $user->id,
                'state_id' => 1,
            ]);
        
        }
        else{

            $address = Address::create([
                'postalcode_id' => $add->postalcode_id,
                'user_id' => $user->id,
                'state_id' => 1,
            ]);
        
        }

        return redirect('/profile');
    }

}
