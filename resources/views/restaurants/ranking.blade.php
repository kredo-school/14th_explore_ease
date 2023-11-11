@extends('layouts.app')

@section('title', 'restaurants.ranking')

@section('content')
<div class="container">
    <div class="h1">FOREIGNERS FRIENDLY RANKING</div>

    <div class="row my-5">
        <!-- Card of restaurant -->
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0" style="position: relative; height: 402px; width: 549px;">
                    <img src="" alt="" class="bg-warning m-0" style="position:absolute; height: 402px; width: 549px;">
                    <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                        <i class="fa-regular fa-bookmark"></i>
                    </a>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-6 ">
                            <p class="h3">Restaurant name</p>
                        </div>
                        <div class="col-6 text-end h3">
                            <a href="" class="text-decoration-none text-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="h4">Place here</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="h4">Features here</p>
                        </div>
                        <div class="col-6 text-end" style="font-size: 16px;">
                            ￥￥￥
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card of restaurant -->
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0" style="position: relative; height: 402px; width: 549px;">
                    <img src="" alt="" class="bg-warning m-0" style="position:absolute; height: 402px; width: 549px;">
                    <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                        <i class="fa-regular fa-bookmark"></i>
                    </a>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-6 ">
                            <p class="h3">Restaurant name</p>
                        </div>
                        <div class="col-6 text-end h3">
                            <a href="" class="text-decoration-none text-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="h4">Place here</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="h4">Features here</p>
                        </div>
                        <div class="col-6 text-end" style="font-size: 16px;">
                            ￥￥￥
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
