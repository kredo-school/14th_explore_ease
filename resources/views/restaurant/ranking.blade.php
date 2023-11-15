@extends('layouts.app')

@section('title', 'restaurants.ranking')

@section('content')
    <!--CDN of slick for ranking-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ranking.css')}}">

<div class="container">
    <div class="h1">FOREIGNERS FRIENDLY RANKING</div>

    <div class="row my-5">
        <ul class="col slider">

            <!-- Card of restaurant 1-->
            <li>
                <div class="card border">
                    <!-- Card header -->
                    <div class="card-header p-0" style="position: relative; height: 402px;">
                        <img src="https://www.parisselectbook.com/wp-content/uploads/2023/04/4912_3.jpg" alt="" class=" m-0 img-fluid" style="object-fit:cover; position:absolute; height: 100%; width: 100%;">
                        <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <!-- Card body -->
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
            </li>


            <!-- Card of restaurant 2-->
            <li>
                <div class="card border">
                    <!-- Card header -->
                    <div class="card-header p-0" style="position: relative; height: 402px;">
                        <img src="https://assets.architecturaldigest.in/photos/6385cf3311f0276636badfb6/16:9/w_1600,c_limit/DSC_8367-Edit-W.png" alt="" class=" m-0 img-fluid" style="object-fit:cover; position:absolute; height: 100%; width: 100%;">
                        <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <!-- Card body -->
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
            </li>

            <!-- Card of restaurant 3-->
            <li>
                <div class="card border">
                    <!-- Card header -->
                    <div class="card-header p-0" style="position: relative; height: 402px;">
                        <img src="https://media.timeout.com/images/106047598/1920/1080/image.jpg" alt="" class=" m-0 img-fluid" style="object-fit:cover; position:absolute; height: 100%; width: 100%;">
                        <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <!-- Card body -->
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
            </li>

            <!-- Card of restaurant 4-->
            <li>
                <div class="card border">
                    <!-- Card header -->
                    <div class="card-header p-0" style="position: relative; height: 402px;">
                        <img src="https://www.japan-guide.com/g20/2036_01.jpg" alt="" class=" m-0 img-fluid" style="object-fit:cover; position:absolute; height: 100%; width: 100%;">
                        <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <!-- Card body -->
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
            </li>

            <!-- Card of restaurant 5-->
            <li>
                <div class="card border">
                    <!-- Card header -->
                    <div class="card-header p-0" style="position: relative; height: 402px;">
                        <img src="https://media.timeout.com/images/105316388/1920/1080/image.jpg" alt="" class=" m-0 img-fluid" style="object-fit:cover; position:absolute; height: 100%; width: 100%;">
                        <a href="" class="text-decoration-none text-black h5" style="position:absolute; top:5%; left:95%;">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>
                    <!-- Card body -->
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
            </li>

        <!--/slider--></ul>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--JS-->
@vite(['resources/js/ranking.js'])
@endsection
