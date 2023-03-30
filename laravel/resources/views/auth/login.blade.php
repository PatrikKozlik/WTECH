<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Pet Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Internetový obchod s potrebami pre zvieratá">
    <meta name="keywords" content="eshop, pets, food, toys, accessorities, dog, cat">
    <meta http-equiv='content-language' content='sk-sk'>
    
    <!-- CSS stylesheets -->
    <link href="{{ asset('../css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('../css/style.css') }}" rel="stylesheet">

</head>
<body>
    
    {{-- Header --}}
    @include('../layouts/header')

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
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    @include('../layouts/footer')


</body>

<!-- JS Scripts -->
<!-- Fafa icons -->
<script src="https://kit.fontawesome.com/1d5e2079b1.js" crossorigin="anonymous"></script>

<!-- Mobile, button -->
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");
    
    btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
    });
</script>
    
</html>

