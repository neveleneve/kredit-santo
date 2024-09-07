<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('bulma/css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ url('fontawesome/css/all.css') }}" rel="stylesheet">
    <style>
        .custom-shadow {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
    @stack('custom-css')
    @livewireStyles
</head>

<body>
    <nav class="navbar is-link custom-shadow is-large py-2" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item has-text-weight-bold is-size-5" href="{{ route('landing-page') }}">
                    {{ env('APP_NAME') }}
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    @guest
                        <div class="navbar-item">
                            <div class="buttons">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="button is-dark is-outlined is-small has-text-weight-bold">
                                        <strong>Sign up</strong>
                                    </a>
                                @endif
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}"
                                        class="button is-light is-outlined is-small has-text-weight-bold">
                                        Log in
                                    </a>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="navbar-dropdown is-right">
                                <a class="navbar-item" href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item"
                                    onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Log Out
                                </a>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <div>
        @auth
            @include('layouts.nav')
        @endauth
        @yield('content')
    </div>
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
        @csrf
    </form>
    <script src="{{ url('fontawesome/js/all.js') }}"></script>
    @stack('custom-js')
    @livewireScripts
</body>

</html>
