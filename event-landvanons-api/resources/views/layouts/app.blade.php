<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Landvanons') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="bg-white pl-5 mt-0 fixed w-full z-10 top-0 shadow-xl">
        <div class="elementor-scrolling-tracker elementor-scrolling-tracker-horizontal elementor-scrolling-tracker-alignment-">
            <div class="current-progress" style="display: flex; width: 33.55%;">
                <div class="current-progress-percentage" style="color: transparent;"></div>
            </div>
        </div>
        <div class="container mx-auto flex items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                    <img class="object-fit-contain h-28 w-auto" src="{{asset('/assets/lvo-logo.png')}}">
                </a>
            </div>
            <div class="flex w-full items-center justify-between md:w-1/2 md:justify-end">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto flex">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item p-5 text-white hover:shadow-xl py-1 px-3 rounded mb-1 border-b font-bold bg-lvo-purple">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item p-5 mx-5 text-white hover:shadow-xl py-1 px-3 rounded mb-1 border-b font-bold bg-lvo-purple">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="mx-5 bg-red-500 text-white hover:shadow-xl py-1 px-3 rounded mb-1 border-b font-bold" style="background-color: rgb(219, 51, 151)">{{ Auth::user()->name }}</li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white hover:shadow-xl py-1 px-3 rounded mb-1 border-b font-bold" style="background-color: rgb(219, 51, 151)">
                                Logout
                            </button>
                        </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 mt-32">
        @yield('content')
    </main>
</div>
</body>
</html>
