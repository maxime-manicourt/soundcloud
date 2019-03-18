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
        <div class="main__nav">
            <div class="nav__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ URL::asset('/img/logo_jackx.png') }}" alt="logo"/>
                </a>
            </div>
            <form id="search">
                    <input type="search" name="search" required placeholder="Recherche"/>
                    <input type="submit" value="Rechercher"/>
            </form>
            <nav class="nav__profile">
                <ul class="nav__profile__list">
                    @guest
                        <a href="{{ route('login') }}" class="link__rounded link__auth"><li class="nav__profile__items">Login</li></a>
                        <a href="{{ route('register') }}" class="link__rounded link__auth"><li class="nav__profile__items">Register</li></a>
                    @else
                        <div id="dropdown">
                            <li class="nav__profile__item avatar-flex"><span class="user__name">{{ Auth::user()->name }}</span>
                                <div class="nav__profile__avatar">
                                    <img src="{{ URL::asset('/img/icon-user.png') }}" alt="logo"/>
                                </div>
                                <i class="fa fa-caret-down"></i>
                            </li>
                            <ul class="dropdown__list">
                                    <a href="">
                                        <li class="dropdown__list__item">Voir son profil</li>
                                    </a>
                                    <a href="">
                                        <li class="dropdown__list__item">Editer son profil</li>
                                    </a>
                                    <a href="">
                                        <li class="dropdown__list__item">Mes tracks</li>
                                    </a>
                                    <a href="">
                                        <li class="dropdown__list__item">Mes playlists</li>
                                    </a>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link__logout">
                                        <li class="dropdown__list__item">
                                            Logout
                                        </li>
                                    </a>    
         
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                     {{ csrf_field() }}
                                 </form>
                        </div>
                        
    
                        <!--
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link__rounded link__upload-s">
                                <li class="nav__profile__items">
                                    Logout
                                </li>
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        -->
                        <a class="link__rounded link__upload-s" href="/nouvelle">
                            <!--<img src="{{ URL::asset('/img/icon-upload.png') }}" alt="upload icon" class="link__icon">-->
                            <li class="nav__profile__items">
                                Upload
                            </li>
                        </a>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

<div id="pjax-container">
    @yield('content')
</div>
<div class="player">
    <audio id="audio" controls></audio>
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>