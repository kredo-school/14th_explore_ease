<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--CDN for mapbox-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

</head>
<body>
    <div id="app">
    <!-- navigation bar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #E7DA3D;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('assets/Logo_ExploreEase_fin.png') }}" alt="Logo" style="width:32px; height:32px;">
                    Explore-Ease
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <!-- Link to Restaurant page -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="restaurant-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Restaurant
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="restaurant-dropdown">
                                <li><a class="dropdown-item" href="{{ route('restaurant.show') }}">See Restaurants</a></li>
                                <li><a class="dropdown-item" href="{{ route('restaurant.adding') }}">Adding new restaurant</a></li>
                            </ul>
                        </li>

                        <!-- Link to Ranking page -->
                        <li class="nav-item my-auto me-3">
                            <a href="#" class="text-decoration-none text-black">Ranking</a>
                        </li>

                        <!-- Language selector-->
                        <li class="nav-item dropdown my-auto me-3">
                            <a class="nav-link dropdown-toggle my-auto me-3 text-black" href="#" id="dropdown" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-globe"></i> Language
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Chinese</a>
                                <a class="dropdown-item" href="#">Korean</a>
                                <a class="dropdown-item" href="#">Spanish</a>
                                <a class="dropdown-item" href="#">French</a>
                                <a class="dropdown-item" href="#">Japanesee</a>
                            </div>
                        </li>

                        <script>
                            $('.dropdown-menu a').click(function(){
                               $('#selected').text($(this).text());
                             });
                        </script>

                        <!-- Avatar -->
                            <li class="nav-item dropdown">
                                <button class="btn shadow-none nav-link" id="account-dropdown" data-bs-toggle="dropdown">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle avatar-sm">
                                    @else
                                    <i class="fa-regular fa-circle-user" style="color: #000000; "></i>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">Profile</a>
                                    <a href="{{-- route('admin.show') --}}" class="dropdown-item">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <hr class="hr-blurry">
                                    <a href="#contact" class="dropdown-item">Contact Us</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-center text-dark mt-5 d-flex align-items-center"  style="background-color: #E7DA3D; height:168.51px">
            <div class="container">
                <a href="https://www.instagram.com/" class="text-decoration-none text-black me-3"><i class="fa-brands fa-instagram  fs-5"></i></a>
                <a href="https://www.facebook.com/" class="text-decoration-none text-black me-3"><i class="fa-brands fa-square-facebook fs-5"></i></a>
                <a href="https://www.snapchat.com/" class="text-decoration-none text-black"><i class="fa-brands fa-snapchat fs-5"></i></a>
                <p class="fs- mt-3">Copyright ©️ 2023</p>
            </div>
        </footer>
    </div>
</body>
</html>
