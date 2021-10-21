<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
<div id="app">
    <nav class="shadow-md bg-gray-800 py-2">
        <div class="container mx-auto md:px-0 max-w-screen-xl">
            <div class="flex items-center justify-around">
                <a class="text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="flex-1 text-right" id="">
                    @guest
                        @if (Route::has('login'))
                            <a class="text-white no-underline hover:text-gray-200"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="text-white no-underline hover:text-gray-200"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="no-underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <div class="bg-gray-700">
        <nav class="container mx-auto flex space-x-1 max-w-screen-xl">
            @yield('navegation')
        </nav>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
