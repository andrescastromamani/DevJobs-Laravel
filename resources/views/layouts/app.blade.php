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
    @yield('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
<div id="app">
    <nav class="bg-gray-800 py-5 px-5 md:px-20">
        <div class="flex items-center">
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
                    <span class="text-gray-300 text-sm">{{ Auth::user()->name }}</span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="no-underline text-gray-300 text-sm" href="{{ route('logout') }}"
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
    </nav>
    <div class="bg-gray-700 px-5 md:px-20">
        <nav class="flex">
            @yield('navegation')
        </nav>
    </div>
    <main class="px-5 md:px-20">
        @yield('content')
    </main>
</div>
@yield('scripts')
</body>
</html>
