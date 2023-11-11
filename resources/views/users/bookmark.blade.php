
@extends('layouts.app')

@section('content')

@include('users.header')


<div class="container w-75 mt-4 mx-auto">
    <div class="row justify-content-center">
        <div class="col-3">
            @include('users.menu')
        </div>
        <div class="col-9">
            <div class="h1">Bookmarks</div>

            <div class="row my-2">
                @for($i=1; $i<=3; $i++)
                    <div class="col-4">
                        <div class="card" style="width: 265px; height: 258px;">
                            <div class="card-header p-0">
                                <p class="bg-warning m-0" style="height: 173px; width: 265px;">image here</p>
                            </div>
                            <div class="card-body w-100 border mt-2 m-0 ms-2">
                                <div class="row">
                                    <div class="col-9">
                                        <a href="{{ route('restaurant.detail') }}"><p class="h4">Restaurant name</p></a>
                                    </div>
                                    <div class="col h3 rowspan='2'">
                                        <a href="" class="text-decoration-none text-black h1">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <p class="border border-dark">
                                            4.5 <i class="fa-solid fa-star"></i>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p>Food Type</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>





</div>
@endsection
