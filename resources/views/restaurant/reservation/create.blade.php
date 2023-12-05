    <!--for datepicker-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    {{-- After comp to make all function on this page, the style blow will put on style.css --}}

        <form action="{{ route('restaurant.reservation.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container" id="reservasion_area">
                {{-- Select Box --}}
                <div class="containaer d-flex flex-row">
                    <div class='container mb-4'>
                        <label for="reservation_ppl">Number of people</label>
                        <select class="form-select" name="reservation_ppl" required>
                            <option value="---"> --- </option>
                            @for($i = 0; $i < 10; $i++)
                            <option value="{{$i + 1}}" name="" required>{{$i + 1}}</option>
                            @endfor
                        </select>
                        
                    </div>
                    {{-- <i class="fa-solid fa-calendar-days"></i> --}}
                    <div class='container mb-4'>
                        <label for="">Date</label>
                        <input id="datepicker" required/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap5'
                            });
                            </script>
                    </div>
                    <div class='container mb-4'>
                        <div class="cs-form">
                            <label for="">Time</label>
                            <input type="time" class="form-control" id="reservation_start_time" value="" required/>
                        </div>
                    </div>
                </div>


                {{-- Check Box  --}}
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                    Seat only
                    </label>
                </div>

                {{-- Couse Area --}}
                <h2 class="mb-4">Course</h2>
                    @foreach($all_courses as $course)
                    <div class="container">
                        <div class="container mb-6 py-4 border-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ $course->photo }}"  class="img-fluid" alt="...">
                                    </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $course->name }} <span>¥ {{ $course->price }} </span></h4>
                                            <p class="card-text">{{ $course->description }}<a href="#">>Read More</a></p>
                                            <input type="radio" class="btn-check b-color" name="options" id="{{ $course->id }}" autocomplete="off">
                                            <label class="btn b-color" for="{{ $course->id }}">Select</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                {{-- Request --}}
                <h2 class="mt-4">Requests</h2>
                <div class="form-group mb-4
                ">
                    <textarea class="form-control" placeholder="leave a comment such as a special requests" id="requests" rows="5"></textarea>
                </div>
                <div class="text-center">
                    <button type="button" class="btn b-color mb-3 mx-3 px-5"><a href="{{ route('home')}}"></a>Cancel</button>
                    <button type="submit" value="submit" id="submit" for="with-consent"name="submit_reservation" class="button btn b-color mb-3 px-5" disabled>Submit</button>
                </div>
            </div>
        </form>
        {{-- Check the check-box status. If the it wasn't checked, submit button is anaible to hit --}}
        @vite(['resources/js/checkbuttonstatus.js'])