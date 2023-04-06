@extends('layouts.app')
 
@section('content')
<section class="mt-32">
    <div class="flex h-fit justify-center mb-8">
        <div class="w-5/6 grid justify-items-center sm:w-2/6 bg-gradient-to-t to-amber-700 from-amber-500 rounded-2xl shadow-md shadow-gray-400 border-solid border-4 border-amber-500">
            <h2 class="font-bold text-white text-3xl m-3 text-center uppercase">Prihláste sa</h2>

            <form method="POST" action="{{ route('login') }}">
                <div class="inline-grid justify-items-center w-full p-5">
                @csrf

                <!-- Email Address -->
                <x-input id="email" type="email" name="email" class="my-2 w-full h-10 rounded-md p-2 text-lg" placeholder="Email" required autofocus />
                <!-- Password -->
                <x-input id="password" type="password" name="password" class="my-2 w-full h-10 rounded-md p-2 text-lg" placeholder="Password" required autocomplete="current-password" />
                <a href="/register" class="underline text-white hover:text-stone-200 mb-2 float-right">Registrovať sa</a>

                <x-button class="bg-amber-600 hover:bg-stone-200 hover:text-amber-600 text-white font-bold py-2 px-4 rounded-full">
                    Prihlásiť sa
                </x-button>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 mt-4 text-center" :errors="$errors" />

                </div>
            </form>
        </div>
    </div>
</section>
@endsection