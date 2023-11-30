
@extends('layouts.app')

@section('content')

@vite(['public/css/style.css'])

<div class="container">
    <div class="h1"  style="margin-left: 100px; padding: 0px; margin-top: 20px;">RESTAURANTS</div>
    <div class="scards">
        @foreach($restaurants as $restaurant)
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    @if(count($restaurant_photos[$loop->index]) > 0)
                        <img src="{{$restaurant_photos[$loop->index][0]->photo}}" class="m-0" style="height: 402px; width: 549px;">
                    @else
                        <img src="{{asset('assets/no-image.png')}}" class="m-0" style="height: 402px; width: 549px; padding: 100px">
                    @endif
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-9">
                            <a href="{{ route('restaurant.detail', $restaurant->id) }}" class="text-black text-bold text-decoration-none"><p class="h3">{{$restaurant->name}}</p></a>
                        </div>
                        <div class="col-auto h3">
                            <p class="border border-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <p class="h4">{{$restaurant->address}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p class="h4">{{$}}</p>
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
