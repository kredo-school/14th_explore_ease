@extends('layouts.app')

@section('content')

<div class="container w-75">
    <h2>All reviews</h2>
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
              <th scope="col">Restaurant name</th>
              <th scope="col">User name</th>
              <th scope="col">Review date</th>
              <th scope="col">Rate</th>
              <th scope="col">review</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            @foreach ($reviews as $review)
            <tr>
                @foreach ($restaurantNames[$loop->index] as $restaurantName)
                    <td class="py-3">{{$restaurantName}}</td>
                @endforeach

                @foreach ($userNames[$loop->index] as $userName)
                    <td class="py-3">{{$userName}}</td>
                @endforeach

                <td class="py-3">{{ $reviewDates[$loop->index] }}</td>

                <td class="py-3">{{ $rates[$loop->index] }}</td>

                <td class="py-3">
                    <div class="myClass">
                        <p id="overflow_text">{{ $reviewComments[$loop->index] }}</p>
                        <span onClick="textLimiter()" id="toggle_text">Read More</span>
                    </div>
                </td>


                <td class="py-3">
                        @if($reviews[$loop->index])
                        {{-- @if ($restaurant->trashed()) --}}
                            <i class="fa-solid fa-circle-minus text-secondary"></i> &nbsp; Inactive
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> &nbsp; Active
                        @endif
                </td>


                <td>
                            @if($reviews[$loop->index])
                            {{-- @if ($restaurant->trashed()) --}}
                                <form action="{{-- route('admin_user.activate',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-secondary">Unhide Review {{-- $review --}}</button>
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
            {{ $reviews->links() }}
        </div>
</div>

@vite(['resources/js/textlimit.js'])
@endsection
