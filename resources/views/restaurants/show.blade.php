
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1">SHOWING</div>

    <div class="row my-5">
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-6 ">
                            <p class="h3">Restaurant name</p>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

                        </div>
                        <div class="col-6 text-end h3">
                            <a href="" class="text-decoration-none text-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                                {{-- {{ $post->user->name }} --}}
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
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-6 ">
                            <p class="h3">Restaurant name</p>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

                        </div>
                        <div class="col-6 text-end h3">
                            <a href="" class="text-decoration-none text-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                                {{-- {{ $post->user->name }} --}}
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
    <div class="row my-5">
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-6 ">
                            <p class="h3">Restaurant name</p>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

                        </div>
                        <div class="col-6 text-end h3">
                            <a href="" class="text-decoration-none text-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                                {{-- {{ $post->user->name }} --}}
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
        <div class="col">
            <div class="card border" style="width: 549px;">
                <div class="card-header p-0">
                    <p class="bg-warning m-0" style="height: 402px; width: 549px;">image here</p>
                </div>
                <div class="card-body w-100 border">
                    <div class="row">
                        <div class="col-6 ">
                            <p class="h3">Restaurant name</p>
                                {{-- @if($post->user->avatar) --}}
                                    {{-- <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm"> --}}
                                {{-- @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif --}}

                        </div>
                        <div class="col-6 text-end h3">
                            <a href="" class="text-decoration-none text-dark">
                                4.5 <i class="fa-solid fa-star"></i>
                                {{-- {{ $post->user->name }} --}}
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
