@extends('layouts.app')

@section('content')

<div class="container w-75">
    <h2>All restaurants</h2>
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
              <th scope="col">id</th>
              <th scope="col">Restaurant name</th>
              <th scope="col">Owner name</th>
              <th scope="col">Registration date</th>
              <th scope="col">Rate</th>
              <th scope="col">Area</th>
              <th scope="col">Food Type</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          {{-- Data starting here --}}
          <tbody>
            @foreach ($restaurants as $restaurant)
            <tr>
                <td class="py-3">{{ $restaurantIds[$loop->index] }}</td>

                <td class="py-3">{{ $restaurantNames[$loop->index] }}</td>

                @foreach ($ownerNames[$loop->index] as $ownerName)
                    <td class="py-3">{{$ownerName->name}}</td>
                @endforeach

                <td class="py-3">{{ $registrationDates[$loop->index] }}</td>

                <td class="py-3">
                    {{ $stars[$loop->index] }}
                    <span class="border-1 rounded text-center px-1" style="background-color: orangered; color: white; border-color: rgb(255, 51, 0); width: 35px; height: 35px">
                        <i class="fa-solid fa-star"></i>
                    </span>
                </td>

                @foreach ($areaTypes[$loop->index] as $areaType)
                    <td class="py-3">{{ $areaType }}</td>
                @endforeach

                @foreach ($foodTypes[$loop->index] as $foodType)
                    <td class="py-3">{{ $foodType }}</td>
                @endforeach


                <td class="py-3">
                        @if($restaurants[$loop->index])
                        {{-- @if ($restaurant->trashed()) --}}
                            <i class="fa-solid fa-circle-minus text-secondary"></i> &nbsp; Inactive
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> &nbsp; Active
                        @endif
                </td>


                <td>
                            @if($restaurants[$loop->index])
                            {{-- @if ($restaurant->trashed()) --}}
                                <form action="{{-- route('admin_user.activate',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-secondary">Activate Owner {{-- $restaurant->id --}}</button>
                            @else
                                <form action="{{-- route('admin_user.deactivate',$userId->id) --}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Deactivate Owner {{-- $restaurant->id --}}</button>
                            @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        <div class="d-flex justify-content-center">
            {{ $restaurants->links() }}
        </div>
</div>


@endsection
