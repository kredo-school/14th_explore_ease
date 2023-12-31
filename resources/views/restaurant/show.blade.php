
@extends('layouts.app')

@section('content')

@vite(['public/css/style.css'])

<div class="container mb-5">
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
                        <div class="col-3 h3 text-end">
                            <span>{{ $restaurant->avgstar }}</span>
                            <span class="border-1 rounded text-center px-1" style="background-color: orangered; color: white; border-color: rgb(255, 51, 0); width: 35px; height: 35px">
                                <i class="fa-solid fa-star"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <p class="h4">{{$restaurant->address}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            @foreach($features[$loop->index] as $feature)
                                <span class="h5 border-0 me-2 rounded text-center px-2" style="background-color: rgb(231, 52, 8); color: white">
                                    {{$feature->featuretype->name}}
                                </span>
                            @endforeach
                        </div>
                        <div class="col text-end" style="font-size: 16px;">
                            Lunch:
                                @foreach($finalBudget[$loop->index] as $budget)
                                    @if($budget->timezonetype == 1)
                                        <div class="border-0 rounded-1 px-1 text-center mb-1" style="display:inline-block; width: 50px; background-color: #E7DA3D; color: black">
                                            {!! str_replace('\\', '¥', e($budget->budgetvalue)) !!}
                                        </div>
                                    @endif
                                @endforeach <br>
                            Dinner:
                                @foreach($finalBudget[$loop->index] as $budget)                              
                                    @if($budget->timezonetype == 2)
                                        <div class="border-0 rounded-1 px-1 text-center" style="display:inline-block;; width: 50px; background-color: #E7DA3D; color: black">
                                            {!! str_replace('\\', '¥', e($budget->budgetvalue)) !!}
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
