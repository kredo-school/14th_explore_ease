    <!--for datepicker-->
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
                        <div class="container">
                            <div class="col-md-3 py-4">
                              <form class="card p-4">
                                <div class="input-group date mb-3" id="datetimepicker1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                  <div class="input-group-text" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <i class="far fa-calendar-alt"></i>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>

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
                @foreach($all_courses as $course)
                    <div class="container mb-6 py-4 border-bottom">
                        <div class="container">
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
        <div class="align-items-center mb-5">
            <button type="button" class="btn btn-warning mb-3"><a href="{{ route('home')}}"></a>Cancel</button>
            <input type="submit" value="Submit" class="btn btn-warning mb-3">
        </div>
</form>