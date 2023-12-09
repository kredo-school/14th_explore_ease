@extends('layouts.app')

@section('title', 'Explore-Ease')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">

    <!-- CDN for Ionic -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    -->
@endsection

@section('content')
    {{-- MainV --}}
    <div class="main vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-lg-5 mx-auto my-5 text-white">
                    <h3>{{ __('messages.search_copy1') }}<br>{{ __('messages.search_copy2') }}</h3>

                    {{-- search bar --}}
                    <ion-searchbar type="text" inputmode="search" name="search" debounce="300" animated="true"
                        class="main-searchbar px-0 py-0"
                        placeholder="{{ __('messages.search_placeholder') }}">
                    </ion-searchbar>
                    <div class="list-group main-searched-content is-hidden">
                        <!--
                        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                          The current button
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                        <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button item</button>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        /**
         * Search Restaurants Script at index.blade.php
         */
        const searchbar = document.querySelector('.main-searchbar');
        searchbar.addEventListener("ionInput", callSearchApi);

        function showSearchedList(restaurants) {
            const searchedContentDiv = document.querySelector('.main-searched-content');

            // hide list panel if there are no data
            if (restaurants == null || restaurants.length == 0) {
                searchedContentDiv.classList.add("is-hidden");
                return;
            }

            // remove old list
            while (searchedContentDiv.firstChild){
                searchedContentDiv.removeChild(searchedContentDiv.firstChild);
            }

            // add button element
            restaurants.forEach(restaurant => {
                let button = document.createElement('button');
                button.innerHTML = restaurant.name;
                button.setAttribute("type", "button");
                button.classList.add("list-group-item");
                button.classList.add("list-group-item-action");
                searchedContentDiv.appendChild(button);
            });

            // set position
            const searchbar = document.querySelector('.main-searchbar');
            const rect = searchbar.getBoundingClientRect();
            const contentHeight = 46.4 * restaurants.length;
            searchedContentDiv.style.height = contentHeight + "px";
            searchedContentDiv.style.width = rect.width + "px";
            searchedContentDiv.style.top = rect.bottom + 3;
            searchedContentDiv.style.left = rect.left;

            searchedContentDiv.classList.remove("is-hidden");
        }

        function callSearchApi(event) {
            // イベント抑止
            event.preventDefault();
            event.stopPropagation();

            const searchbar = document.querySelector('.main-searchbar');
            const url = "/api/restaurants/search?search=" + searchbar.value;
            const method = "GET";
            const headers = {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            };

            // RestaurantApiController呼び出し
            fetch(url, {
                method,
                headers
            }).then(response => {
                if (!response.ok) {
                    // APIレスポンスエラー時
                    console.log('search response error!');
                } else {
                    // APIレスポンス成功時
                    console.log('search response success.');
                    return response.json().then(data => {
                        // 検索結果候補リスト表示
                        showSearchedList(data);
                    });
                }
            }).catch(error => {
                // 通信エラー時
                console.log(error);
            });
        }
    </script>
@endsection