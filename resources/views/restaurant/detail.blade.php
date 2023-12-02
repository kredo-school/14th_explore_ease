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
                    <!-- to be update: create route&function to review!!!! -->
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none text-dark h5">
                            4.5 <i class="fa-solid fa-star"></i>
                        </a>
                    </div>

                    <!-- Bookmark -->
                    <!-- to be update: create route&function to bookmark !!! -->
                    <div class="col-2">
                        <a href="" class="text-decoration-none text-black h5">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>

                    <!-- Restaurant edit page -->
                    <!-- to be update: display this only for Restaurant ORNER !!!!-->
                    <div class="col-2 text-end">
                        <a href="{{route('restaurant.edit')}}" class="btn btn-secondary border-dark w-75">Edit</a>
                    </div>
                </div>

                <!-- Address -->
                <p>{{ $restaurant->address }}</p>

                <!-- Price -->
                <!-- to be discussed & update: need to change budgets table on database?-->
                <h5 class="mt-5">Lunch:&ensp;
                    @foreach ($LunchValues as $LunchValue)
                    {{ $LunchValue }}&emsp;
                    @endforeach
                </h5>
                <h5 class="">Dinner:&ensp;
                    @foreach ($DinnerValues as $DinnerValue)
                    {{ $DinnerValue }}&emsp;
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
                <!-- to be update: create route&function to openhors !!! -->
                <table style="width: 25%;" class="mt-3">
                    <tr>
                        <td>Mon</td>
                        <td>11:00 - 20:00</td>
                    </tr>
                    <tr>
                        <td>Tue</td>
                        <td>11:00 - 20:00</td>
                    </tr><tr>
                        <td>Wed</td>
                        <td>closed</td>
                    </tr>
                    <tr>
                        <td>Thr</td>
                        <td>11:00 - 20:00</td>
                    </tr>
                    <tr>
                        <td>Fri</td>
                        <td>11:00 - 20:00</td>
                    </tr>
                    <tr>
                        <td class="text-primary">Sat</td>
                        <td>11:00 - 20:00</td>
                    </tr>
                    <tr>
                        <td class="text-danger">Mon</td>
                        <td>11:00 - 20:00</td>
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
                            <td scope="col" style="width: 10%"><i class="fa-solid fa-circle-user h4"></i></td>
                            <td scope="col" style="width: 10%" >
                                <div class="text-decoration-none text-dark h5">
                                {{ $eachReview->star }} <i class="fa-solid fa-star"></i>
                                </div>
                            </td>
                            <td scope="col" style="width: 60%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0;">{{ $eachReview->comment }} </td>
                            <td scope="col" style="width: 20%" class="text-end">{{ $eachReview->created_at }}</td>
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
