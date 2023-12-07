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
                    <div class="col-6">
                        <h2>{{ $restaurant->name }}</h2>
                    </div>

                    <!-- Rating -->
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none text-dark h5">
                            {{ $averageAllStar }} <i class="fa-solid fa-star"></i>
                        </a>
                    </div>

                    <!-- Bookmark -->
                    <div class="col-2">
                        @if($restaurant->is_bookmarked())
                            <form action="{{ route('bookmark.destroy', $restaurant->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn p-0">
                                    <i class="fa-solid fa-bookmark fa-lg"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('bookmark.store', $restaurant->id) }}" method="post">
                            @csrf
                                <button type="submit" class="btn p-0">
                                    <i class="fa-regular fa-bookmark text-black fa-lg"></i>
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Restaurant edit page -->
                    <!-- to be update: display this only for Restaurant ORNER !!!!-->
                    <div class="col-2 text-end">
                        <a href="{{route('restaurant.edit')}}" class="btn btn-secondary border-dark w-75">Edit</a>
                    </div>
                </div>

                <!-- Postal Address -->
                <p>{{ $restaurant->address }}</p>

                <!-- Budget -->
                <h5 class="mt-4">
                    <span style="display:inline-block; width:60px;">Lunch :</span>
                    @foreach ($LunchValues as $LunchValue)
                    <div class="border border-black rounded-1 px-1" style="display:inline-block;">{!! str_replace('\\', '¥', e($LunchValue)) !!}</div>&nbsp;
                    @endforeach
                </h5>
                <h5>
                    <span style="display:inline-block; width:60px;">Dinner:</span>
                    @foreach ($DinnerValues as $DinnerValue)
                    <div class="border border-black rounded-1 px-1" style="display:inline-block;">{!! str_replace('\\', '¥', e($DinnerValue)) !!}</div>&nbsp;
                    @endforeach
                </h5>

                <!-- Food type -->
                <h5 class="mt-4">{{ $foodtype->name }}</h5>

                <!-- Feature -->
                <div class="mt-4">
                    @foreach ($featureTypes as $featureType)
                    <div>
                        <div href="" class="btn btn-light border-dark me-3" style="float:left;">{{ $featureType }}</div>
                    </div>
                    @endforeach
                </div>
                <br>

                <!-- Time zone -->
                <div class="row mt-5">
                        @if ($sumTimezones == 1)
                            <div class="col-1">
                                <i class="fa-regular fa-sun h4"></i>
                            </div>
                        @elseif($sumTimezones == 2)
                            <div class="col-1">
                                <i class="fa-regular fa-moon h4"></i>
                            </div>
                        @elseif($sumTimezones == 3)
                            <div class="col-1">
                                <i class="fa-regular fa-sun h4"></i>
                            </div>
                            <div class="col-1">
                                <i class="fa-regular fa-moon h4"></i>
                            </div>
                        @else
                            <!-- Empty -->
                        @endif
                </div>

                <!-- Open hours -->
                <table style="width: 25%;" class="mt-3">
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
                <h5>About us</h5>
                <hr>
                <p>{{ $restaurant->description }}
                </p>
            </div>

            <!--  Location section -->
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-10">
                        <h5>Location</h5>
                    </div>
                    <div class="col-2 text-end">
                        <div class="btn btn-secondary border-dark">{{ $areatype->station_name }}</div>
                    </div>
                </div>
                <hr>

                <!--  MAP -->
                <div id="map" class="py-5 bg-secondary" style='width: 100%; height: 300px;'></div>

            </div>

            <!--  Course section -->
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-2">
                        <h5>Course</h5>
                    </div>
                    <div class="col-8">
                        <a href="" class="btn btn-light border-dark">Main menu</a>
                        <a href="" class="btn btn-light border-dark">Course</a>
                    </div>
                    <div class="col-2 text-end">
                        <a href="{{ route('restaurant.reservations', $restaurant->id) }}" class="btn btn-secondary border-dark">Reservation</a>
                    </div>
                </div>
                <hr>
            </div>

            <!--  Main menu -->

            <!--  Course menu -->
            <div class="col-8 mb-6">
                <!--  Course 1 -->
                <div class="mb-5 border-bottom">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="https://scontent-nrt1-2.xx.fbcdn.net/v/t39.30808-6/305990626_403997255192763_1264677505506611830_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=Rw8b-V_tTKgAX-ziRMO&_nc_ht=scontent-nrt1-2.xx&oh=00_AfBb6wrXpKFUcRqFDbiE8EUDozLrlJMAmsN_FkwwsMlLSQ&oe=654A1B93" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body ms-4">
                          <h5 class="card-title">Couse1 <span>¥ 6,000</span></h5>
                          <p class="card-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<a href="#">>Read More</a></p>
                        </div>
                      </div>
                    </div>
                </div>

                <!--  Course 2 -->
                <div class="mb-5 border-bottom">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="https://scontent-nrt1-2.xx.fbcdn.net/v/t39.30808-6/305990626_403997255192763_1264677505506611830_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=Rw8b-V_tTKgAX-ziRMO&_nc_ht=scontent-nrt1-2.xx&oh=00_AfBb6wrXpKFUcRqFDbiE8EUDozLrlJMAmsN_FkwwsMlLSQ&oe=654A1B93" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body ms-4">
                          <h5 class="card-title">Couse1 <span>¥ 6,000</span></h5>
                          <p class="card-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<a href="#">>Read More</a></p>
                        </div>
                      </div>
                    </div>
                </div>

                <!--  Course 3 -->
                <div class="mb-5 border-bottom">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="https://scontent-nrt1-2.xx.fbcdn.net/v/t39.30808-6/305990626_403997255192763_1264677505506611830_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=Rw8b-V_tTKgAX-ziRMO&_nc_ht=scontent-nrt1-2.xx&oh=00_AfBb6wrXpKFUcRqFDbiE8EUDozLrlJMAmsN_FkwwsMlLSQ&oe=654A1B93" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body ms-4">
                          <h5 class="card-title">Couse1 <span>¥ 6,000</span></h5>
                          <p class="card-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<a href="#">>Read More</a></p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <!-- Review section -->
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-10">
                        <h5>Review</h5>
                    </div>
                    <div class="col-2 text-end">
                        <a href="{{ route('restaurant.review',$restaurant->id) }}" class="btn btn-secondary border-dark">Reiview</a>
                    </div>
                </div>
                <hr>

                <div>
                    <table class="table table-borderless">
                        @foreach ($review as $eachReview)
                        <tr>
                            <td scope="col" style="width: 10%">
                                    @if(Auth::user()->profile->avatar)
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" style="margin-top: ">
                                        <img src="{{ $profile->avatar }}" class="img-thumbnail rounded-circle w-50">
                                    </a>
                                    @else
                                        <i class="fa-solid fa-circle-user text-secondary fs-3"></i>
                                    @endif
                            </td>
                            <td scope="col" style="width: 10%">
                                <div class="text-decoration-none text-dark h5" style="margin-top:4px;">
                                    {{ $eachReview->star }} <i class="fa-solid fa-star"></i>
                                </div>
                            </td>
                            <td scope="col" style="width: 60%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0;">
                                <span class="d-flex align-items-center">{{ $eachReview->comment }}</span>
                            </td>
                            <td scope="col" style="width: 20%" class="text-end">
                                <span class="d-flex align-items-center">{{ $eachReview->created_at }}</span>
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


@endsection
