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
    <div class="main d-flex align-items-center" style="height: 75vh">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-lg-5 mx-auto my-5 text-white">
                    <h2>{{ __('messages.search_copy1') }}<br>{{ __('messages.search_copy2') }}</h2>

                    {{-- hidden form --}}
                    <form action="#" method="GET" class="main-form is-hidden">
                        <input type="hidden" name="search" value="" class="main-hidden-search">
                    </form>
                    {{-- search bar --}}
                    <ion-searchbar type="text" inputmode="search" name="search_bar" debounce="300" animated="true"
                        class="main-searchbar px-0 py-0"
                        placeholder="{{ __('messages.search_placeholder') }}">
                    </ion-searchbar>
                    <div class="list-group main-searched-content is-hidden overflow-y-auto">
                        <!--
                        <a href="/restaurant/1/detail" class="text-decoration-none">
                            <button type="button" class="list-group-item list-group-item-action">
                            The current button
                            </button>
                        </a>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        /**
         * Search Restaurants Script at index.blade.php
         */
        const searchbar = document.querySelector('.main-searchbar');
        searchbar.addEventListener("ionInput", showList);
        searchbar.addEventListener("ionChange", moveList);

        function moveList() {
            try {
                const searchKeyWord = getSearchKeyWord();
                submitForm(searchKeyWord);
            } catch (error) {
                console.error(`It has an error (${error})`);
            }
        }

        async function showList() {
            try {
                const searchKeyWord = getSearchKeyWord();
                const restautants = await fetchSearchApi(searchKeyWord);
                const searchedList = createSearchedList(restautants);
                showSearchedList(searchedList);
            } catch(error) {
                console.error(`It has an error (${error})`);
            }
        }

        function getSearchKeyWord() {
            return document.querySelector('.main-searchbar').value;
        }

        function getFormElement() {
            return document.querySelector('.main-form')
        }

        function getHiddenSearchElement() {
            return document.querySelector('.main-hidden-search')
        }

        function submitForm(searchKeyWord) {
            const url = "/restaurant/show";
            const form = getFormElement();
            const hidden = getHiddenSearchElement();
            form.action = url;
            hidden.value = searchKeyWord;
            form.submit();
        }

        function fetchSearchApi(searchKeyWord) {
            const url = "/api/restaurants/search?search=" + searchKeyWord;
            const method = "GET";
            const headers = {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            };

            return fetch(
                url, {
                method,
                headers
            }).then(response => {
                if (!response.ok) {
                    // APIレスポンスエラー時
                    console.log('search response error!');
                    return Promise.reject(new Error(`${response.status}:${response.statusText}`));
                } else {
                    // APIレスポンス成功時
                    // JSONオブジェクトで解決されるPromiseを返す
                    console.log('search response success.');
                    return response.json();
                }
            });
        }

        function createSearchedList(restaurants) {
            const searchedContentDiv = document.querySelector('.main-searched-content');

            // remove old list
            while (searchedContentDiv.firstChild){
                searchedContentDiv.removeChild(searchedContentDiv.firstChild);
            }

            // add button element
            restaurants.forEach(restaurant => {
                let anchor = document.createElement('a');
                anchor.href = `/restaurant/${restaurant.id}/detail`;
                anchor.classList.add("text-decoration-none");

                let button = document.createElement('button');
                button.innerHTML = `
                    <div class="restaurant-name">${restaurant.name}</div>
                    <div class="restaurant-address">${restaurant.address}</div>`;
                button.setAttribute("type", "button");
                button.classList.add("list-group-item");
                button.classList.add("list-group-item-action");
                button.classList.add("searched-list-group-button");
                anchor.appendChild(button);

                searchedContentDiv.appendChild(anchor);
            });

            // set position
            const searchbar = document.querySelector('.main-searchbar');
            const rect = searchbar.getBoundingClientRect();
            const baseHeight = 58.54;
            let contentHeight = 0;
            if (restaurants.length <= 5) {
                contentHeight = baseHeight * restaurants.length;
            } else {
                contentHeight = baseHeight * 5;
            }
            searchedContentDiv.style.height = contentHeight + "px";
            searchedContentDiv.style.width = rect.width + "px";
            searchedContentDiv.style.top = rect.bottom + 3;
            searchedContentDiv.style.left = rect.left;

            return searchedContentDiv;
        }

        function showSearchedList(searchedList) {
            if (searchedList.childElementCount < 1) {
                searchedList.classList.add("is-hidden");
            } else {
                searchedList.classList.remove("is-hidden");
            }
        }
    </script>
@endsection