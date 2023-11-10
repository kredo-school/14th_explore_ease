
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1">Bookmarks</div>

    <div class="row my-5">
        <div class="col-4">
            <div class="card" style="width: 265px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 173px; width: 265px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-9">
                            <a href="{{ route('restaurant.detail') }}"><p class="h4">Restaurant name</p></a>
                        </div>
                        <div class="col-auto h3">
                            <a href="" class="text-decoration-none text-black h5">
                                <i class="fa-regular fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="border border-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                        <div class="col-6">
                            <p>Food Type</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-9">
                        <a href="{{ route('restaurant.detail') }}"><p class="h3">Restaurant name</p></a>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

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
        </div>
    </div>
    <div class="row my-5">
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-9">
                            <a href="{{ route('restaurant.detail') }}"><p class="h3">Restaurant name</p></a>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

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
        </div>
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-9">
                        <a href="{{ route('restaurant.detail') }}"><p class="h3">Restaurant name</p></a>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

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
        </div>
    </div>


</div>
@endsection
