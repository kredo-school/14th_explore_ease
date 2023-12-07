@extends('layouts.app')

@section('content')
    {{-- MainV --}}
    <div class="main vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-lg-5 mx-auto my-5 text-white">
                    <h3>{{ __('messages.search_copy1') }}<br>{{ __('messages.search_copy2') }}</h3>

                    {{-- search form --}}
                    <form id="searchform" method="GET" action="{{ route('restaurants.search') }}">
                        @csrf
                        <ion-searchbar id="searchbar" type="search" inputmode="search" name="search" placeholder="{{ __('messages.search_placeholder') }}" color="light" animated="true" show-clear-button="focus" clear-icon="trash-bin"></ion-searchbar>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <!-- CDN for Ionic -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <script>
        function sendSearchValue(event) {
            // alert(event.target.value);
            event.preventDefault();
            document.getElementById('searchform').submit();
        }

        const searchbar = document.getElementById('searchbar');
        searchbar.addEventListener("ionChange", sendSearchValue);
    </script>
@endsection