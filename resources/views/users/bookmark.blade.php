
@extends('layouts.app')

@section('content')

@include('users.header')

@vite(['public/css/style.css'])

<div class="container w-75 mt-4 mx-auto">
    <div class="row">
        <div class="col-3">
            @include('users.menu')
        </div>
        <div class="col-9 p-0">
            <div class="row">
                <div class="col">
                    <div class="h1">Bookmarks</div>
                </div>
                <div class="col-auto me-0 pe-0">
                    {{-- search form --}}
                    <form method="GET" action="http://www.google.co.jp/search">
                        <input type="search" name="search" class="btn btn-light btn-lg text-start" placeholder="Search">
                        {{-- search button --}}
                        <button type="submit" class="btn btn-light btn-lg" name="submit" alt="search" value="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
            <div class="rcards">
                @if(!empty($bookmarks))
                    @foreach($bookmarks as $bookmark)
                        <div class="card mb-2" style="width: 265px; height: auto;">
                            <div class="card-header p-0">
                                <img src="{{$restaurant_photos[$loop->index]->photo}}" class="m-0" style="height: 173px; width: 265px;">
                            </div>
                            <div class="card-body w-100 border p-0">
                                <div class="row ps-2">
                                    <div class="col-9">
                                        <a href="{{ route('restaurant.detail', $bookmark->restaurant_id) }}" class="text-decoration-none text-black h4" style="line-height: 42.15px">
                                            {{$bookmark->restaurant->name}}
                                        </a>
                                    </div>
                                    <div class="col h3">
                                        <form action="{{route('bookmark.destroy', $bookmark->restaurant_id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border border-white bg-white">
                                                <i class="fa-solid fa-bookmark fa-2x" style="color: #E7DA3D; font-size: 25px; line-height: 42.15px"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row ps-2 mb-2">
                                    <div class="col">
                                        @foreach($features[$loop->index] as $feature)
                                            <span class="h6 border-0 me-1 rounded text-center px-1" style="background-color: rgb(231, 52, 8); color: white">
                                                {{$feature->featuretype->name}}
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="col-3">
                                        {{ $bookmark->restaurant->avgstar }}
                                        <span class="border-1 rounded text-center px-1" style="background-color: orangered; color: white; border-color: rgb(255, 51, 0); width: 35px; height: 35px">
                                            <i class="fa-solid fa-star"></i>
                                        <span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
