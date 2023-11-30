
@extends('layouts.app')

@section('content')

@vite(['public/css/style.css'])

<div class="container">
    <div class="h1">SHOWING</div>
    <div class="rcards">
        @foreach($restaurants as $restaurant)
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <img src="{{$restaurant_photos[$loop->index]->photo}}" class="m-0" style="height: 402px; width: 549px;">
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-9">
                            <a href="{{ route('restaurant.detail', $restaurant->id) }}"><p class="h3">Restaurant name</p></a>
                        </div>
                        <div class="col-auto h3">
                            <p class="border border-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <p class="h4">Place here</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p class="h4">Features here</p>
                        </div>
                        <div class="col text-end" style="font-size: 16px;">
                            ￥￥￥
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
