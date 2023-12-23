@extends('layouts.app')

@section('content')

<div class="container w-75">
    <h2>All reservations</h2>
    {{-- Search Box --}}
    <div class="container text-end mb-3">
        <form class="form-inline">
          <div class="form-group row d-flex flex-row-reverse">
            <div class="col-sm-3">
              <input type="password" class="form-control" id="inputPassword" placeholder="Search">
            </div>
          </div>
        </form>
    </div>

    {{-- User Info Date Table --}}
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Restaurant name</th>
              <th scope="col">User name</th>
              <th colspan="2">Reservation Date/Time</th>
              <th scope="col">Minutes</th>
              <th scope="col">Number of people</th>
              <th scope="col">Seat only</th>
              <th colspan="2">Course</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td class="py-3">{{ $reserveIds[$loop->index] }}</td>

                @foreach ($restaurantNames[$loop->index] as $restaurantName)
                    <td class="py-3">{{$restaurantName}}</td>
                @endforeach

                @foreach ($userNames[$loop->index] as $userName)
                    <td class="py-3">{{$userName}}</td>
                @endforeach

                <td class="py-3">{{ $startDates[$loop->index] }}</td>
                <td class="py-3">{{ $startTimes[$loop->index] }}</td>

                <td class="py-3">{{ $reserveMinutes[$loop->index] }}</td>

                <td class="py-3">{{ $numbers[$loop->index] }}</td>

                <td class="py-3">
                    @if($seatOnlys[$loop->index])
                    {{ $seatOnlys[$loop->index] }}
                    @else
                    --
                    @endif
                </td>

                @foreach ($courseNames[$loop->index] as $courseName)
                    @if($courseName)
                    <td class="py-3">
                    {{$courseName}}
                    </td>
                    @else
                    <td class="py-3">
                    ----
                    </td>
                    @endif
                @endforeach


                @foreach ($coursePrices[$loop->index] as $coursePrice)
                @if($coursePrice)
                    <td class="py-3">
                    {{$coursePrice}}
                    </td>
                    @else
                    <td class="py-3">
                    ----
                    </td>
                    @endif
                @endforeach



                <td class="py-3">
                        @if($reservations[$loop->index])
                        {{-- @if ($restaurant->trashed()) --}}
                            <i class="fa-solid fa-circle-minus text-secondary"></i> &nbsp; Inactive
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> &nbsp; Active
                        @endif
                </td>


                <td>
                            @if($reservations[$loop->index])
                            {{-- @if ($restaurant->trashed()) --}}
                                <form action="{{-- route('admin_user.activate',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-secondary">Cancel Resevation {{-- $review --}}</button>
                            @else
                                <form action="{{-- route('admin_user.deactivate',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Hide Owner {{-- $review --}}</button>
                            @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        <div class="d-flex justify-content-center">
            {{ $reservations->links() }}
        </div>
</div>

@endsection
