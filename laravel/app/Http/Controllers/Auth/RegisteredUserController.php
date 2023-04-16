<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'password.min' => "Heslo musí mať najmenej 8 znakov",
            'password.confirmed' => "Heslá sa nezhodujú",
            'email.unique' => "Email už existuje"
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'state_id' => 1,
            'role_id' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return view('auth.voluntary_registration');
    }
}
