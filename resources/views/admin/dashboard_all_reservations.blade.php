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
                <td class="py-3">{{ $reservation[$loop->index] }}</td>

               
                <td class="py-3">{{$reservation->restaurant->name}}</td>


                <td class="py-3">{{$reservation->user->username}}</td>

                <td class="py-3">{{ $reservation->reservation_start_date }}</td>
                <td class="py-3">{{ $reservation->reservation_start_time }}</td>

                <td class="py-3">{{ $reservation->reservation_minutes }}</td>

                <td class="py-3">{{ $reservation->number_of_people }}</td>

                <td class="py-3">
                    @if($reservation->seat_id == 1)
                      Available
                    @else
                      Unavailable
                    @endif
                </td>

                <td class="py-3">
                    {{ $reservation->course->name }}
                </td>

                <td class="py-3">
                    ￥{{ $reservation->course->price }}
                </td>

                <td>
                    <button type="submit" class="btn b-color" data-bs-toggle="modal" data-bs-target="#cancel-reservation-{{ $reservation->id }}">Cancel Reservation</button>
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
