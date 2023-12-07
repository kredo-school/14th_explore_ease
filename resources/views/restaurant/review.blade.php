@extends('layouts.app')

@section('title', 'restaurants.detail')

@section('content')

@section('styles')
<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
@endsection

<!-- pass data to review.js -->
<script type="text/javascript">
    var countstar5 =  {{ $countStar5 }};
    var countstar4 =  {{ $countStar4 }};
    var countstar3 =  {{ $countStar3 }};
    var countstar2 =  {{ $countStar2 }};
    var countstar1 =  {{ $countStar1 }};
</script>

@vite(['resources/js/review_StarGraph.js'])

<main class="container">
    <div class="row justify-content-center">
        <h1>REVIEWING</h1>
        <form action="{{ route('restaurant.review.store', $restaurant->id) }}" method="post">
            @csrf


        <!--Star rating area -->
        <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-2 my-auto">
                        <a href="{{ route('profile.show', Auth::user()->id) }}" class="">
                            @if(Auth::user()->profile->avatar)
                                <img src="{{ $profile->avatar }}" class="header-image img-thumbnail rounded-circle mx-5 w-100 h-100">
                            @else
                                <i class="fa-solid fa-circle-user icon-user text-secondary mx-5" style="font-size:9rem;"></i>
                            @endif
                        </a>
                    </div>

                    <div class="col-4 my-auto">
                        <h2 class="mx-5">{{ $user->name }}</h2>
                    </div>

                    <div class="col-6 my-auto text-start">
                        <div>
                            <h2>Start your review of <a href="#" style="color:#F8B0A6" class="text-decoration-none"> {{ $restaurant->name }} </a></h2>
                        </div>
                        <br>
                        <div>
                            <h3>Select rating</h3>
                        </div>

                        <!-- Stars -->
                        <div class="rate-form">
                            <input id="star5" type="radio" name="star" value="5">
                            <label for="star5">★</label>
                            <input id="star4" type="radio" name="star" value="4">
                            <label for="star4">★</label>
                            <input id="star3" type="radio" name="star" value="3">
                            <label for="star3">★</label>
                            <input id="star2" type="radio" name="star" value="2">
                            <label for="star2">★</label>
                            <input id="star1" type="radio" name="star" value="1">
                            <label for="star1">★</label>
                        </div>
                        <br>
                        {{-- Error --}}
                        @error('star')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!--Comment area -->
            <div class="mt-5">
                <label for="comment"><h3>COMMENT AREA</h3></label>
                <textarea name="comment" id="comment" rows="5" class="form-control w-100 bg-transparent"></textarea>
                {{-- Error --}}
                @error('comment')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

        <!--BUTTONS -->
            <div class="row justify-content-center mt-3">
                <div class="col-6 text-end">
                    <a href="{{ route('restaurant.detail', $restaurant->id) }}" class="btn btn-light btn-outline-dark" style="width: 30%">Cancel</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-secondary" style="width: 30%">Post</button>
                </div>
            </div>
        </form>


        <!--Review total area -->
        <div class="mt-5">
            <div class="row justify-content-center">

                <!--Graph -->
                <div class="col-6">
                    <canvas id="ReviewChart" class="h-75"></canvas>
                </div>

                <!--Number -->
                <div class="col-3 text-center">
                        <div style="font-size: 5rem;">{{ $averageAllStars }}</div>

                        <div class="result-rating-rate">
                            <span class="star5_rating" data-rate="{{ $averageAllStars }}"></span>
                        </div>

                        <p style="font-size: 1.5rem;" class="text-decoration-none text-dark">
                            <span>{{ $countAllStars }}</span> reviews
                        </p>
                </div>

            </div>

        </div>

    </div>


</main>

@endsection
