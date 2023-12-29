@extends('layouts.app')

@section('title', $restaurant->name)

@section('content')

{{-- Main V --}}
<div class="p-0 overflow-hidden main_v_reservation">
    <img src="{{ $restaurantphoto->photo }}" alt="restaurant_reservation_image" class="img-fluid overflow-hidden">
</div>
<div class="container mb-5">
  <div class="container mt-5 w-50">
    {{-- Message Area --}}
    <div class="container mb-5">
      <h1 class="mb-4">{{ $restaurant->name }}</h2>
      <h3 class="mb-2">Message from Venue</h3>
        <p>{{ $restaurant->description }}</p>
        {{-- Check Box  --}}
      <div class="form-check mb-4">
        <form method="post">
          <input class="form-check-input" type="checkbox" id="with-consent">
          <label class="form-check-label" for="with-consent"> 
          I confirm I've read the Message from Venue above
          </label>
        </form>
      </div>
    </div>
      @include('restaurant.reservation.create')
  </div>
</div>
@endsection

