    <!--for datepicker-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    {{-- After comp to make all function on this page, the style blow will put on style.css --}}

        <form id="form-reservation">
            @csrf
            <div class="container" id="reservasion_area">
                <div class="containaer d-flex flex-row">
                    <div class='container mb-4'>
                        <label for="number_of_people">Number of people</label>
                        <select class="form-select" name="number_of_people" id="number_of_people" required>
                            <option value="---"> --- </option>
                            @for($i = 0; $i < 10; $i++)
                            <option id="number_of_people" value="{{$i + 1}}" name="" required>{{$i + 1}}</option>
                            @endfor
                        </select>
                                    {{-- Error --}}
                            @error('number_of_people')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class='container mb-4'>
                        <label for="">Date</label>
                        <input id="datepicker" name="reservation_start_date" required/>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap5'
                            });

                        </script>
                    </div>
                    <div class='container mb-4'>
                        <div class="cs-form">
                            <label for="">Time</label>
                            <input type="time" class="form-control" id="reservation_start_time" required/>
                        </div>
                    </div>
                </div>


                {{-- Check Box  --}}
                <div class="form-check mb-4">
                    <input class="form-check-input" name="seat_only" type="checkbox" id="reservation_minutes" value="60">
                    <label class="form-check-label" for="reservation_minutes">
                    Seat only
                    </label>
                </div>

                {{-- test --}}

                
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
                                            <input type="radio" class="btn-check b-color" name="course" id="{{ $course->id }}" value="{{ $course->id }}" autocomplete="off">
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
                    <textarea class="form-control" placeholder="leave a comment such as a special requests" name="requests" id="requests" rows="5"></textarea>
                </div>
                <div class="text-center">
                    <button type="button" class="btn b-color mb-3 mx-3 px-5"><a href="{{ route('home')}}"></a>Cancel</button>
                    <button id="submit" type="button" for="with-consent" name="submit_reservation" class="button btn b-color mb-3 px-5" data-bs-toggle="modal" data-bs-target="#confirm-reservation" data-bs-target="confirm-reservation" onclick="reservationSubmit()" disabled>Submit</button>
                </div>
            </div>
        </form>
        {{-- profile_edit modal --}}
        @include('restaurant.reservation.modal.reservation_confirm')

        {{-- Check the check-box status. If the it wasn't checked, submit button is anaible to hit --}}
        @vite(['resources/js/checkbuttonstatus.js'])
