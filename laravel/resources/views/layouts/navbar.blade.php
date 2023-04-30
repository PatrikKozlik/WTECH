<!-- Navbar -->
<nav class="fixed w-full top-0 z-50 px-2 sm:px-4 py-2.5 rounded bg-gradient-to-b from-amber-700 to-amber-800 text-white items-center border-solid border-b-2 border-amber-500">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div class="flex md:order-1">
            <h2 class="inline-flex"><img class="mr-2" src="{{asset('images/paw.png')}}" height="10" width="24" alt="logo"><b><a href="/">Pet Home</a></b></h2>
        </div>
        
        <div class="flex order-2 md:hidden">
            <div>
                <a href="/cart1" class="mx-3"><i class="text-lg align-bottom fa-sharp fa-solid fa-cart-shopping"></i></a>
            </div>
            @if(count(session()->get('my_cart',[])) != 0)
                    <span class="custom_cart">{{count(session()->get('my_cart',[]))}}</span>
                @endif
            
            
                @auth
                    {{-- <a href="/login">{{ Auth::user()->email }}</a> --}}
                    
                    @if(Auth::user()->role_id == 4)
                        <a href="/home" class="mx-3"><i class="align-bottom fa-sharp fa-solid fa-table-list"></i></a>
                    @endif

                    <a href="/profile" class="mx-3"><i class="align-bottom fa-solid fa-user-gear"></i></i></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="mx-3"><i class="align-bottom fa-solid fa-right-from-bracket"></i></i></a>
                    </form>
                @else
                    <a href="/login" class="mx-3"><i class="text-lg align-bottom fa-sharp fa-solid fa-user"></i></a>
                @endauth

            <button data-collapse-toggle="navbar-solid-bg" type="button" class="mobile-menu-button text-xl inline-flex items-center p-2 ml-3 text-white rounded-lg md:hidden hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-900" aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <i class="align-bottom fa-sharp fa-solid fa-bars"></i>
            </button>
        </div>
        
        <div class="hidden order-3 items-center md:flex md:order-2" id="navbar-solid-bg">
            <ul class="inline-flex">
                <li class="lg:mx-8 md:mx-3 sm:mx-2"><a href="/category/Krmivo">Krmivo</a></li>
                <li class="lg:mx-8 md:mx-3 sm:mx-2"><a href="/category/Hračky">Hračky</a></li>
                <li class="lg:mx-8 md:mx-3 sm:mx-2"><a href="/category/Príslušenstvo">Príslušenstvo</a></li>
                <li class="lg:mx-8 md:mx-3 sm:mx-2"><a href="/contact">Kontakt</a></li>
            </ul>
        </div>

        <div class="hidden float-right items-center md:flex md:float-none md:order-3">
            <ul class="inline-flex">
                <div>
                    <li class="mx-3"><a href="/cart1"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a></li>
                </div>
                @if(count(session()->get('my_cart',[])) != 0)
                    <span class="custom_cart">{{count(session()->get('my_cart',[]))}}</span>
                @endif
                @auth
                    {{-- <a href="/login">{{ Auth::user()->email }}</a> --}}
                    
                    @if(Auth::user()->role_id == 4)
                        <li class="mx-3"><a href="/home"><i class="fa-sharp fa-solid fa-table-list"></i></a></li>
                    @else
                        <li class="mx-3"><a href="/products_list"><i class="fa-sharp fa-solid fa-table-list"></i></a></li>
                    @endif

                    <li class="mx-3"><a href="/profile"><i class="fa-solid fa-user-gear"></i></i></a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="mx-3"><a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i></i></a></li>
                    </form>
                @else
                    <li class="mx-3"><a href="/login"><i class="fa-sharp fa-solid fa-user"></i></a></li>
                @endauth
            </ul>
        </div>
    </div>

    <div class="mobile-menu hidden order-3 items-center md:hidden md:order-2 mt-5" id="navbar-solid-bg">
        <ul class="">
            <a href="/category/Krmivo"><li class="m-2 p-2 lg:mx-8 md:mx-3 sm:mx-2 text-center bg-amber-900 rounded-md">Krmivo</li></a>
            <a href="/category/Hračky"><li class="m-2 p-2 lg:mx-8 md:mx-3 sm:mx-2 text-center bg-amber-900 rounded-md">Hračky</li></a>
            <a href="/category/Príslušenstvo"><li class="m-2 p-2 lg:mx-8 md:mx-3 sm:mx-2 text-center bg-amber-900 rounded-md">Príslušenstvo</li></a>
            <a href="/contact"><li class="m-2 p-2 lg:mx-8 md:mx-3 sm:mx-2 text-center bg-amber-900 rounded-md">Kontakt</li></a>
        </ul>
    </div>
</nav>
<!--// -->