@extends('layouts.app')

@section('title', 'restaurants.detail')

@section('content')

<!-- pass latitude and longitude data to mapForDetail.js -->
<script type="text/javascript">
    var latitude =  {{ $restaurant->latitude }};
    var longitude = {{ $restaurant->longitude }};
</script>

@vite(['resources/js/mapForDetail.js'])

    <main class="container">
        <!-- Picture section -->
        <div class="row justify-content-center">
            @foreach ($restaurantphoto as $photo)
                <div class="col-4">
                    <img src="{{ $photo->photo }}" alt="" class="img-fluid" style="object-fit:cover; width:450px; height:450px">
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center mt-5">
            <!--  Basic Info section -->
            <div class="col-8">
                <div class="row">
                    <!-- Resturant name -->
                    @if($profile->usertype_id == 3)
                        <div class="col-6">
                            <h2 style="line-height: 42.55px">{{ $restaurant->name }}</h2>
                        </div>
                    @else
                        <div class="col-8">
                            <h2 style="line-height: 42.55px">{{ $restaurant->name }}</h2>
                        </div>
                    @endif

                    <!-- Rating -->
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none text-dark h4" style="line-height: 42.55px">
                            <span>{{ round($averageAllStar,1) }}</span>
                            <span class="border-1 rounded text-center px-1" style="background-color: orangered; color: white; border-color: rgb(255, 51, 0); width: 35px; height: 35px">
                                <i class="fa-solid fa-star"></i>
                            </span>
                        </a>
                    </div>

                    <!-- Bookmark -->
                    <div class="col-2">
                        @if($restaurant->is_bookmarked())
                            <form action="{{ route('bookmark.destroy', $restaurant->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn p-0" style="line-height: 42.55px">
                                    <i class="fa-solid fa-bookmark fa-2x" style="color: #E7DA3D; font-size: 25px; line-height: 42.55px"></i>
                                </button>
                                <span class="text-decoration-none text-dark h4" style="line-height: 42.55px">  Saved</span>
                            </form>
                        @else
                            <form action="{{ route('bookmark.store', $restaurant->id) }}" method="post">
                            @csrf
                                <button type="submit" class="btn p-0" style="line-height: 42.55px">
                                    <i class="fa-regular fa-bookmark text-black fa-2x" style="font-size: 25px; line-height: 42.55px"></i>
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Restaurant edit page -->
                    @if($profile->usertype_id == 3)
                        <div class="col-2 text-end">
                            <a href="{{route('restaurant.edit', $restaurant->id)}}" class="btn b-color w-75">Edit</a>
                        </div>
                    @endif
                </div>

                <!-- Postal Address -->
                <p class="h4">{{ $restaurant->address }}</p>

                <!-- Budget -->
                <h5 class="mt-3">
                    <span style="display:inline-block; width:60px;">Lunch :</span>
                    @foreach ($LunchValues as $LunchValue)
                        <div class="border-0 rounded-1 px-1 text-center" style="display:inline-block; width: 70px; background-color: #E7DA3D; color: black">
                            {!! str_replace('\\', '¥', e($LunchValue)) !!}
                        </div>&nbsp;
                    @endforeach
                </h5>
                <h5>
                    <span style="display:inline-block; width:60px;">Dinner:</span>
                    @foreach ($DinnerValues as $DinnerValue)
                        <div class="border-0 rounded-1 px-1 text-center" style="display:inline-block; width: 70px; background-color: #E7DA3D; color: black">
                            {!! str_replace('\\', '¥', e($DinnerValue)) !!}
                        </div>&nbsp;
                    @endforeach
                </h5>

                <!-- Food type -->
                <h4 class="mt-3">FoodType: {{ $foodtype->name }}</h4>

                <!-- Feature -->
                <div class="mt-3">
                    @foreach ($featureTypes as $featureType)
                        <span class="h5 border-0 me-2 rounded text-center px-2" style="background-color: rgb(231, 52, 8); color: white">
                            {{ $featureType }}
                        </span>
                    @endforeach
                </div>
                <br>

                <!-- Time zone -->
                <div class="row mt-2">
                        @if ($sumTimezones == 1)
                            <div class="col-1">
                                <i class="fa-regular fa-sun h3"></i>
                            </div>
                        @elseif($sumTimezones == 2)
                            <div class="col-1">
                                <i class="fa-regular fa-moon h3"></i>
                            </div>
                        @elseif($sumTimezones == 3)
                            <div class="col-1">
                                <i class="fa-regular fa-sun h3"></i>
                            </div>
                            <div class="col-1">
                                <i class="fa-regular fa-moon h3"></i>
                            </div>
                        @else
                            <!-- Empty -->
                        @endif
                </div>

                <!-- Open hours -->
                <table style="width: 50%;" class="mt-3 h4">
                    <tr>
                        <td>Mon</td>
                        <td>
                        @foreach ($openHours1 as $openHour1)
                            @if ($openHour1->openinghours)
                            {{ substr($openHour1->openinghours, 0, 5) }} ~ {{ substr($openHour1->closinghours, 0, 5) }}
                            @else
                                closed
                            @endif
                        @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Tue</td>
                        <td>
                            @foreach ($openHours2 as $openHour2)
                                @if ($openHour2->openinghours)
                                   {{ substr($openHour2->openinghours, 0, 5) }} -  {{ substr($openHour2->closinghours, 0, 5) }}
                                @else
                                    closed
                                @endif
                            @endforeach
                        </td>
                    </tr><tr>
                        <td>Wed</td>
                        <td>
                            @foreach ($openHours3 as $openHour3)
                                @if ($openHour3->openinghours)
                                   {{ substr($openHour3->openinghours, 0, 5) }} -  {{ substr($openHour3->closinghours, 0, 5) }}
                                @else
                                    closed
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Thr</td>
                        <td>
                            @foreach ($openHours4 as $openHour4)
                                @if ($openHour4->openinghours)
                                   {{ substr($openHour4->openinghours, 0, 5) }} -  {{ substr($openHour4->closinghours, 0, 5) }}
                                @else
                                    closed
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Fri</td>
                        <td>
                            @foreach ($openHours5 as $openHour5)
                                @if ($openHour5->openinghours)
                                   {{ substr($openHour5->openinghours, 0, 5) }} -  {{ substr($openHour5->closinghours, 0, 5) }}
                                @else
                                    closed
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="text-primary">Sat</td>
                        <td>
                            @foreach ($openHours6 as $openHour6)
                                @if ($openHour6->openinghours)
                                   {{ substr($openHour6->openinghours, 0, 5) }} -  {{ substr($openHour6->closinghours, 0, 5) }}
                                @else
                                    closed
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="text-danger">Mon</td>
                        <td>
                            @foreach ($openHours0 as $openHour0)
                                @if ($openHour0->openinghours)
                                   {{ substr($openHour0->openinghours, 0, 5) }} -  {{ substr($openHour0->closinghours, 0, 5) }}
                                @else
                                    closed
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>

            <!--  Discription section -->
            <div class="col-8 mt-5">
                <h4>About us</h4>
                <hr>
                <p class="h5">{{ $restaurant->description }}</p>
            </div>

            <!--  Location section -->
            <div class="col-8 mt-5 h4">
                <div class="row">
                    <div class="col-10">
                        <h4>Location</h4>
                    </div>
                    <div class="col-2 text-center">
                        <div class="border border-dark rounded-3 p-1">{{ $areatype->station_name }}</div>
                    </div>
                </div>
                <hr>

                <!--  MAP -->
                <div id="map" class="py-5 bg-secondary" style='width: 100%; height: 300px;'></div>
            </div>

            <!--  Course section -->
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-6">
                        <h4>Course</h4>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('restaurant.reservations', $restaurant->id) }}" class="btn b-color">Reservation</a>
                    </div>
                </div>
                <hr>
            </div>

            <!--  Course menu -->
            <div class="col-8 mt-3">
                @foreach($all_courses as $course)
                <div class="mb-4 border-bottom">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $course->photo }}" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ms-4">
                            <h5 class="card-title">{{ $course->name }} <span>¥ {{ $course->price }} </span></h5>
                            <p class="card-text">{{ $course->description }}<a href="#">>Read More</a></p>
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!--  Main menu -->
            <div class="col-8 mt-4">
                <div class="col">
                    <h4>Main menu</h4>
                </div>
                <hr>
                <span class="h5">{{ $restaurant->menu }}</span>
            </div>

            <!-- Review section -->
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-10">
                        <h4>Review</h4>
                    </div>
                    <div class="col-2 text-end">
                        <a href="{{ route('restaurant.review',$restaurant->id) }}" class="btn b-color">Reiview</a>
                    </div>
                </div>
                <hr>

                <div>
                    <table class="table table-borderless">
                        @foreach ($review as $eachReview)
                        <tr class="align-middle">
                            <td scope="col" style="width: 100px">
                                    @if($profile->avatar)
                                        <a href="{{ route('profile.show', $user->id) }}">
                                            <img src="{{ $profile->avatar }}" class="img-thumbnail rounded-circle" style="width: 50.79px; height: 50.79px">
                                        </a>
                                    @else
                                        <i class="fa-solid fa-circle-user text-secondary fs-3"></i>
                                    @endif
                            </td>
                            <td scope="col" style="width: 100px" class="h4">
                                {{ $eachReview->star }} 
                                <span class="border-1 rounded text-center px-1" style="background-color: orangered; color: white; border-color: rgb(255, 51, 0); width: 50.79px; height: 50.79px">
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </td>
                            <td scope="col" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;" class="h5">
                                <span class="d-flex align-items-center" style="width: 400px;">{{ $eachReview->comment }}</span>
                            </td>
                            <td scope="col" class="text-end h5">
                                <span class="d-flex align-items-center" style="width: 200px">{{ $eachReview->created_at }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $review->links() }}
                    </div>
                </div>

            </div>
        </div>

    </main>
    @vite(['resources/js/checkbuttonstatus.js'])

@endsection
