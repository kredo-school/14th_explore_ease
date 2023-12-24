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

                <td class="py-3">
                    @foreach ($courseNames[$loop->index] as $courseName)
                        {{$courseName}}
                    @endforeach
                </td>

                <td class="py-3">
                    @foreach ($coursePrices[$loop->index] as $coursePrice)
                        ¥{{$coursePrice}}
                    @endforeach
                </td>

                <td>
                    <button type="submit" class="btn b-color" data-bs-toggle="modal" data-bs-target="#cancel-reservation-{{ $reservation->id }}">Cancel Reservation{{ $reservation->id}}</button>
                </td>
                @include('admin.modal.cancel_reservation')
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        <div class="d-flex justify-content-center">
            {{ $reservations->links() }}
        </div>
</div>

@vite(['resources/js/checkbuttonstatus.js'])
@endsection
