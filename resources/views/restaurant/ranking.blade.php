@extends('layouts.app')

@section('title', 'restaurants.ranking')

@section('content')
    <!--CDN of slick for ranking-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ranking.css')}}">

<div class="container">
    <div class="h1 mt-5">Foreigners Friendly Ranking</div>

    <div class="row my-5">
        <ul class="col slider">

            <!-- Card of restaurant 1-->
            @foreach ($restaurants as $restaurant)
            <li>
                <div class="card border">
                    <!-- Card header -->
                    <div class="card-header p-0" style="position: relative; height: 402px;">
                        @if(count($restaurant_photos[$loop->index]) > 0)
                            <img src="{{ $restaurant_photos[$loop->index][0]->photo }}" alt="{{ $restaurant_photos[$loop->index][0]->name }}" class=" m-0 img-fluid" style="object-fit:cover; position:absolute; height: 100%; width: 100%;">
                            <a href="" class="text-decoration-none" style="position:absolute; top:5%; left:90%;">
                                @if($restaurant->is_bookmarked())
                                <form action="{{ route('bookmark.destroy', $restaurant->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn p-0">
                                        <i class="fa-solid fa-bookmark fa-lg" style="color:#E7DA3D; font-size:25px;"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('bookmark.store', $restaurant->id) }}" method="post">
                                @csrf
                                    <button type="submit" class="btn p-0">
                                        <i class="fa-solid fa-bookmark fa-lg" style="color:white; font-size:25px;"></i>
                                    </button>
                                </form>
                            @endif
                            </a>
                        @else
                            <img src="{{asset('assets/no-image.png')}}" class="m-0" style="height: 402px; width: 549px; padding: 100px">
                        @endif
                    </div>
                    <!-- Card body -->
                    <div class="card-body w-100 border" style="height:190px;">
                        <div class="row">
                            <div class="col-6 ">
                                <a href="{{ route('restaurant.detail', $restaurant_id[$loop->index] ) }}" class="h3 text-black text-bold text-decoration-none">{{ $restaurant_names[$loop->index] }}</a>
                            </div>
                            <div class="col-6 text-end h3">
                                <a href="" class="text-decoration-none text-dark">
                                    {{-- @foreach($stars as $star) --}}
                                    {{ $stars[$loop->index] }} <i class="fa-solid fa-star"></i>
                                    {{-- @endforeach --}}
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="h5">{{$restaurant_addresses[$loop->index]}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                @foreach($features[$loop->index] as $feature)
                                <span class="h6 border border-dark rounded me-1" style="padding: 2.5px; line-height:2rem;">
                                    {{$feature->featuretype->name}}
                                </span>
                                @endforeach
                            </div>
                            <div class="col-6 text-start">
                                @if (array_sum($timezoneLunch[$loop->index]) == 0)
                                    Lunch&nbsp;: --- <br>
                                @else
                                    Lunch&nbsp;:
                                    @foreach($finalBudget[$loop->index] as $budget)
                                        @if($budget->timezonetype == 1)
                                            <span class="h6 border border-black rounded-1" style="padding: 1px; margin-right: 3px; line-height:2rem;">
                                                {!! str_replace('\\', '¥', e($budget->budgetvalue)) !!}
                                            </span>
                                        @endif
                                    @endforeach <br>
                                @endif

                                @if ($timezoneDinner[$loop->index])
                                    Dinner:
                                    @foreach($finalBudget[$loop->index] as $budget)
                                        @if($budget->timezonetype == 2)
                                            <span class="h6 border border-black rounded-1" style="padding: 1px; margin-right: 3px; ">
                                                {!! str_replace('\\', '¥', e($budget->budgetvalue)) !!}
                                            </span>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--JS-->
@vite(['resources/js/ranking.js'])
@endsection
