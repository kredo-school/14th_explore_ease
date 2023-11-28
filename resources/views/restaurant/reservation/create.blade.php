    <!--for datepicker-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<form action="" method="post">

        <div class="container" id="reservasion_area">
            {{-- Select Box --}}
            <div class="container">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='container'>
                            <select class="form-selectx" name="reservation_ppl" aria-label="Default select example">
                                <option value="---"> --- </option>
                                    @for($i = 0; $i < 10; $i++)
                                        <option value="{{$i + 1}}">{{$i + 1}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
              </div>

                <div class="container">
                        {{-- <i class="fa-solid fa-calendar-days"></i> --}}
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datetime'>
                                <input type='text' class="form-control" name="reservation_start_date"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                  <script>
                  $(function () {
                    $('#datetime').datetimepicker();
                  });
                  </script>

            {{-- Check Box  --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                Seat only
                </label>
            </div>
        </div>

        {{-- Couse Area --}}
        <h2 class="mb-4">Course</h2>
         @foreach($course as $course)
            <div class="container mb-6">
                <div class="container mb-5 border-bottom">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $course->photo }}"  class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h4 class="card-title">{{ $course->name }} <span>¥ {{ $course->price }} </span></h4>
                        <p class="card-text">{{ $course->description }}<a href="#">>Read More</a></p>
                        <button type="button" class="btn btn-warning mb-3">Select</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        {{-- Request --}}
        <h2 class="mb-4">Requests</h2>
        <div class="form-group  mb-5">
            <textarea class="form-control" placeholder="leave a comment such as a special requests" id="requests" rows="5"></textarea>
        </div>
        </div>
        </div>
        <button type="button" class="btn btn-warning mb-3"><a href="{{ route('home')}}"></a>Cancel</button>
        <input type="submit" value="Submit" class="btn btn-warning mb-3">
</form>