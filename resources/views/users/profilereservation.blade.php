@extends('layouts.app')

@section('content')
    {{-- profile page --}}
    @include('users.header')

    <form method="POST" action="#">
        @csrf
        <div class="container w-75 mt-4 mx-auto">
            <div class="row justify-content-center">

                {{-- profile list --}}
                <div class="col-3">
                    @include('users.menu')
                </div>

                {{-- reservation list --}}
                <div class="col-9">
                    <div class="row ">
                        <div class="col-6">
                            <h1>Reservation</h1>
                        </div>
                        <div class="col-6 text-end">
                            {{-- search form --}}
                            <form method="GET" action="http://www.google.co.jp/search" class="text-center">
                                <input type="search" name="search" class="btn btn-light btn-lg text-start" placeholder="Search">
                            {{-- search button --}}
                                <button type="submit" class="btn btn-light btn-lg" name="submit" alt="search" value="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Restaurant</th>
                                    <th>Date Time</th>
                                    <th>Number of people</th>
                                    <th>Menu</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    @if($reservation->user_id == Auth::user()->id)
                                        <tr style="vertical-align: middle">
                                            <td>{{ $reservation->restaurant->name }}</td>
                                            <td>{{ $reservation->reservation_start_date }}<br>{{ $reservation->reservation_start_time }}</td>
                                            <td>{{ $reservation->number_of_people }} {{ $reservation->number_of_people == 1 ? 'person' : 'people' }}</td>
                                            @if(empty($reservation->course_id))
                                                <td>ー (Only Seat)</td>
                                            @else
                                                <td>Course {{ $reservation->course_id }}</td>
                                            @endif
                                            @if(empty($reservation->course_id))
                                                <td>ー</td>
                                            @else
                                                <td>{{$reservation->course->price}}</td>
                                            @endif
                                            <td>
                                                <a href="#" class="btn b-color">Edit</a>
                                            </td>
                                            <td>
                                                {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                                <button class="btn b-color">
                                                    Cancel
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--paginate_area-->
                <div class= "d-flex justify-content-center">
                    {{ $reservations->links() }}
                </div>
            </div>
        </div>
@endsection
