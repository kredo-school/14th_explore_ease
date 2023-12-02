@extends('layouts.app')

@section('title', $restaurant->name)

@section('content')

{{-- Main V --}}
<div class="container-fluid mb-4 p-0 overflow-hidden main_v_reservation">
    <img src="{{ $restaurantphoto->photo }}" alt="restaurant_reservation_image" class="img-fluid overflow-hidden">
</div>
<div class="container w-50">
        {{-- Message Area --}}
        <div class="container mb-5">
            <h2 class="mb-4">{{ $restaurant->name }}</h2>
            <h3 class="mb-2">Message from Venue</h3>
              <p>
              {{ $restaurant->description }}
              </p>

            {{-- Check Box  --}}
            <div class="form-check mb-4">
              <form action="#" method="post">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked"> 
                I confirm I've read the Message from Venue above
                </label>
              </form>
            </div>
          </div>
          @include('restaurant.reservation.create')
</div>
@endsection

