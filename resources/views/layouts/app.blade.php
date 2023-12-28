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
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css'])
    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- CDN for mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />

    <!-- CDN for Ionic -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" /> -->

    <!-- Ionic Config -->
    <script>
        window.Ionic = {
            config: {
                mode: 'ios'
            }
        }
    </script>
</head>
<body>
    <div id="app" class="main_contentsarea">
        <!-- navigation bar -->
        <nav id="app-nav" class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #E7DA3D; height: 80px">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <img class="logo justify-content-center" src="{{ asset('assets/Logo_ExploreEase_fin.png') }}" alt="Logo" style="width: 50px; height: 50px;">
                    <span style="display: inline-block; line-height: 42px; margin-left: 5px; font-size: xx-large;" class="justify-content-center py-2">Explore-Ease</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto h5">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <span style="display: inline-block; line-height: 42px;">{{ __('Login') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <span style="display: inline-block; line-height: 42px;">{{ __('Register') }}</span>
                                    </a>
                                </li>
                            @endif
                        @else
                            <!-- Link to Restaurant page -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-black" href="#" id="restaurant-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span style="display: inline-block; line-height: 42px;">Restaurant</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="restaurant-dropdown">
                                    <li><a class="dropdown-item" href="{{ route('restaurant.show') }}">See Restaurants</a></li>
                                    <li><a class="dropdown-item" href="{{ route('restaurant.adding') }}">Adding new restaurant</a></li>
                                </ul>
                            </li>

                            <!-- Link to Ranking page -->
                            <li class="nav-item my-auto ms-3 me-3">
                                <a href="{{ route('restaurant.ranking') }}" class="text-decoration-none text-black">
                                    <span style="display: inline-block; line-height: 42px;">Ranking</span>
                                </a>
                            </li>

                            <!-- Language selector-->
                            <li class="nav-item dropdown my-auto me-1">
                                <a class="nav-link dropdown-toggle my-auto text-black" href="#" id="dropdown" data-bs-toggle="dropdown">
                                    <span style="display: inline-block; line-height: 42px;"><i class="fa-solid fa-globe"></i> Language</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/setlocale/en">English</a>
                                    <a class="dropdown-item" href="/setlocale/zh">Chinese</a>
                                    <a class="dropdown-item" href="/setlocale/ko">Korean</a>
                                    <a class="dropdown-item" href="/setlocale/es">Spanish</a>
                                    <a class="dropdown-item" href="/setlocale/fr">French</a>
                                    <a class="dropdown-item" href="/setlocale/ja">Japanese</a>
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
                                    @if(Auth::user()->profile != null && Auth::user()->profile->avatar)
                                        <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="img-thumbnail rounded-circle" style="width: 42px; height: 42px;">
                                    @else
                                        <span style="display: inline-block; line-height: 42px;">
                                            <i class="fa-regular fa-circle-user fa-lg" style="color: #000000; "></i>
                                        </span>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">Profile</a>

                                    @can('admin')
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard</a>
                                    @endcan

                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main>
            @yield('content')
        </main>

        <footer id="app-footer" class="bd-footer text-center text-dark d-flex align-items-center py-5">
            <div class="container">
                <a href="https://www.instagram.com/" class="text-decoration-none text-black me-3"><i class="fa-brands fa-instagram fa-2x"></i></a>
                <a href="https://www.facebook.com/" class="text-decoration-none text-black me-3"><i class="fa-brands fa-square-facebook fa-2x"></i></a>
                <a href="https://www.snapchat.com/" class="text-decoration-none text-black"><i class="fa-brands fa-snapchat fa-2x"></i></a>
                <p class="mt-2 mb-0 fs-5">Copyright ©️ 2023</p>
            </div>
        </footer>
    </div>
</body>
</html>
