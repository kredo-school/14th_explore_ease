@extends('layouts.app')

@section('title', 'restaurants.detail')

@section('content')

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
                        <h2>Restaurant Name</h2>
                    </div>

                    <!-- Rating -->
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none text-dark h5">
                            4.5 <i class="fa-solid fa-star"></i>
                            {{-- {{ $post->user->name }} --}}
                        </a>
                    </div>

                    <!-- Bookmark -->
                    <div class="col-2">
                        <a href="" class="text-decoration-none text-black h5">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    </div>

                    <!-- Restaurant edit page -->
                    <div class="col-2">
                        <a href="{{route('restaurant.edit')}}" class="btn btn-secondary border-dark">Edit</a>
                    </div>
                </div>

                <!-- Address -->
                <p>461 Harris St, Ultimo NSW 2007, Australia</p>

                <!-- Price -->
                <h5 class="mt-3">¥ ¥ ¥ ¥</h5>

                <!-- Food type -->
                <h5 class="mt-3">Food type</h5>

                <!-- Feature -->
                <div class="row mt-3">
                    <div class="col-1">
                        <a href="" class="btn btn-light border-dark">feature</a>
                    </div>
                    <div class="col-1">
                        <a href="" class="btn btn-light border-dark">feature</a>
                    </div>
                    <div class="col-1">
                        <a href="" class="btn btn-light border-dark">feature</a>
                    </div>
                    <div class="col-1">
                        <a href="" class="btn btn-light border-dark">feature</a>
                    </div>
                </div>

                <!-- Time zone -->
                <div class="row mt-4">
                    <div class="col-1">
                        <i class="fa-regular fa-sun h4"></i>
                    </div>
                    <div class="col-1">
                        <i class="fa-regular fa-moon h4"></i>
                    </div>
                </div>

                <!-- Open hours -->
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, illo dicta quaerat facilis vero quidem inventore aperiam temporibus ipsam similique. Aut inventore ab accusamus, eaque labore porro quibusdam fugiat! Dicta!Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo repudiandae sit, quia aperiam ab iusto ullam, illum beatae impedit sunt perferendis recusandae aut consectetur ut mollitia voluptatem sequi fuga debitis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea reiciendis minima porro sequi, nisi maiores ab deserunt? Dolorum ipsam, eligendi veritatis at dignissimos doloribus! Incidunt aperiam tempore quis vel rem.
                </p>
            </div>

            <!--  Location section -->
            <div class="col-8 mt-5">
                <div class="row">
                    <div class="col-10">
                        <h5>Location</h5>
                    </div>
                    <div class="col-2 text-end">
                        <a href="" class="btn btn-secondary border-dark">location</a>
                    </div>
                </div>
                <hr>

                <!--  API: Google map-->
                <div id="my_map" style="width: 100%; height: 300px"></div>
                <script src="https://maps.googleapis.com/maps/api/js?key=<YOUR-API-KEY>&callback=initMapWithAddress" async defer></script>
                    <script>
                    var _my_address = '461 Harris St, Ultimo NSW 2007, Australia';
                    function initMapWithAddress() {
                        var opts = {
                            zoom: 15,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                        };
                        var my_google_map = new google.maps.Map(document.getElementById('my_map'), opts);
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode(
                          {
                            'address': _my_address,
                            'region': 'jp'
                          },
                          function(result, status){
                            if(status==google.maps.GeocoderStatus.OK){
                                var latlng = result[0].geometry.location;
                                my_google_map.setCenter(latlng);
                                var marker = new google.maps.Marker({position:latlng, map:my_google_map, title:latlng.toString(), draggable:true});
                                google.maps.event.addListener(marker, 'dragend', function(event){
                                    marker.setTitle(event.latLng.toString());
                                });

                            }
                          }
                        );
                      }
                    </script>
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
                        <a href="" class="btn btn-secondary border-dark">Reservation</a>
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

                <table class="table table-borderless">
                    <tr>
                        <td scope="col" style="width: 10%"><i class="fa-solid fa-circle-user h4"></i></td>
                        <td scope="col" style="width: 10%" >
                            <a href="" class="text-decoration-none text-dark h5">
                            4.5 <i class="fa-solid fa-star"></i>
                            {{-- {{ $post->user->name }} --}}
                            </a>
                        </td>
                        <td scope="col" style="width: 60%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi aliquam magni Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi aliquam magni Lorem ipsum dolor s</td>
                        <td scope="col" style="width: 20%" class="text-end">18:23 21/0ct/2023</td>
                    </tr>

                    <tr>
                        <td scope="col" style="width: 10%"><i class="fa-solid fa-circle-user h4"></i></td>
                        <td scope="col" style="width: 10%">
                            <a href="" class="text-decoration-none text-dark h5">
                            4.5 <i class="fa-solid fa-star"></i>
                            {{-- {{ $post->user->name }} --}}
                            </a>
                        </td>
                        <td scope="col" style="width: 60%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi aliquam magni Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi aliquam magni Lorem ipsum dolor s</td>
                        <td scope="col" style="width: 20%" class="text-end">18:23 21/0ct/2023</td>
                    </tr>

                    <tr>
                        <td scope="col" style="width: 10%"><i class="fa-solid fa-circle-user h4"></i></td>
                        <td scope="col" style="width: 10%">
                            <a href="" class="text-decoration-none text-dark h5">
                            4.5 <i class="fa-solid fa-star"></i>
                            {{-- {{ $post->user->name }} --}}
                            </a>
                        </td>
                        <td scope="col" style="width: 60%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; max-width: 0;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi aliquam magni Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi aliquam magni Lorem ipsum dolor s</td>
                        <td scope="col" style="width: 20%" class="text-end">18:23 21/0ct/2023</td>
                    </tr>
                </table>
            </div>
        </div>

    </main>


@endsection
