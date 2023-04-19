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


class ProfileController extends Controller
{
    public function profile_view(){

        $address = Address::select('p.value as postal_code', 'c.value as city', 's.value as street', 'sn.value as street_n')
                        ->join('postal_code as p', 'p.id', '=', 'address.postalcode_id')
                        ->join('street as s', 's.id', '=', 'p.street_id')
                        ->join('street_number as sn', 'sn.id', '=', 's.street_number_id')
                        ->join('city as c', 'c.id', '=', 'sn.city_id')
                        ->where([
                            ['address.user_id', '=', Auth::user()->id],
                            
                        ])
                        ->first();

        return view('profile', ['address' => $address]);
    }

    public function edit_profile(Request $request){

        # Update user information
        $user = User::find(Auth::user()->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;

        $user->save();

        $address = Address::select('p.value as postal_code', 'c.value as city', 's.value as street')
                        ->join('postal_code as p', 'p.id', '=', 'address.postalcode_id')
                        ->join('street as s', 's.id', '=', 'p.street_id')
                        ->join('street_number as sn', 'sn.id', '=', 's.street_number_id')
                        ->join('city as c', 'c.id', '=', 'sn.city_id')
                        ->where([
                            ['address.user_id', '=', Auth::user()->id],
                            
                        ])
                        ->first();

        if ($request->street_n == null){
            $request->street_n = "";
        }
        if ($request->city == null) {
            $request->city = "";
        }
        if ($request->street == null) {
            $request->street = "";
        }
        if ($request->postal_code == null) {
            $request->postal_code = "";
        }


        # If address for user doesnt exist
        if (empty($address)) {

            $city = City::create([
                'value' => $request->city,
            ]);

            $street_n = Street_number::create([
                'value' => $request->street_n,
                'city_id' => $city->id,
            ]);

            $street = Street::create([
                'value' => $request->street,
                'street_number_id' => $street_n->id,
            ]);
            
            $postalCode = Postal_code::create([
                'value' => strval($request->postal_code),
                'street_id' => $street->id,
            ]);
            
            $address = Address::create([
                'postalcode_id' => $postalCode->id,
                'user_id' => $user->id,
                'state_id' => 1,
            ]);
        
        }
        # If address for user does exist
        else{

            $address = Address::where('user_id', $user->id)->first();
            $postal_code = Postal_code::where('id', $address->postalcode_id)->first();
            $street = Street::where('id', $postal_code->street_id)->first();
            $street_n = Street_number::where('id', $street->street_number_id)->first();
            $city = City::where('id', $street_n->city_id)->first();
           
            if ($request->street_n == null){
                $request->street_n = "";
            }
            if ($request->city == null) {
                $request->city = "";
            }
            if ($request->street == null) {
                $request->street = "";
            }
            if ($request->postal_code == null) {
                $request->postal_code = "";
            }
            
            $street->value = $request->street;
            $street_n->value = $request->street_n;
            $city->value = $request->city;
            $postal_code->value = $request->postal_code;
            
            $street->save();
            $street_n->save();
            $city->save();
            $postal_code->save();
        
        }

        $address = Address::select('p.value as postal_code', 'c.value as city', 's.value as street')
                        ->join('postal_code as p', 'p.id', '=', 'address.postalcode_id')
                        ->join('street as s', 's.id', '=', 'p.street_id')
                        ->join('street_number as sn', 'sn.id', '=', 's.street_number_id')
                        ->join('city as c', 'c.id', '=', 'sn.city_id')
                        ->where([
                            ['address.user_id', '=', Auth::user()->id],
                            
                        ])
                        ->first();

        return redirect('/profile');
    }


}
