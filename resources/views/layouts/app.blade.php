<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <a href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <nav>
        <ul>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li> Bonjour {{ Auth::user()->name }}</li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </ul>
    </nav>
</header>
<!-- Authentication Links -->

<div id="main">
    @yield('content')
</div>
<div class="player">
    <audio id="audio" controls></audio>
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>