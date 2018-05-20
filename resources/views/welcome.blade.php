<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Praktikumsverwaltung') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .wlinks > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase
        }
    </style>
</head>

<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Praktikumsverwaltung') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

<div style="position: relative; height: 100vh;  align-items: center; display: flex; justify-content: center;">
    <div style="text-align: center; color: #636b6f;">
        <div class="wlinks">
            <a href="{{ route('praktika.index') }}">Praktika</a>
            <a href="{{ route('firmen.index') }}">Firmen</a>
            <a href="{{ route('teilnehmer.index') }}">Teilnehmer</a>
            <a href="{{ route('kontaktliste.index') }}">Kontaktaufnahme</a>
            <a href="{{ route('ansprechpartner.index') }}">Ansprechpartner</a>
            <a href="{{ route('ansprechpartnerliste.create') }}">Ansprechpartner verbinden</a>
        </div>
        <div style="font-size: 84px; margin-bottom: 30px; font-weight: 100;">
            Praktikumsverwaltung
        </div>

        <div class="wlinks">
            <a href="{{ route('semester.index') }}">Semester</a>
            <a href="{{ route('praktikazeitraeume.index') }}">Praktikazeiträume</a>
            <a href="{{ route('berufsziel.index') }}">Berufsziel</a>
        </div>
    </div>
</div>
</body>
</html>
