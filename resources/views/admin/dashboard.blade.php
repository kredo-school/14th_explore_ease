@extends('layouts.app')

<!-- Chart.js for graph -->
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
@vite(['resources/js/dashboard_graph.js'])
@endsection

@section('content')

<div class="container w-50">
  <h2 class="mt-5">Dashboards</h2>
{{-- Number of users, reviews, and reservations --}}
        <div class="row border mt-3">
            <div class="col-4 themed-grid-col text-center">
                <h4 class="text-center">Users</h4>
                <span>
                    <i class="fa-solid fa-circle-user fa-3x"></i>
                    <p class="d-inline display-5">{{ count($profileUsers) }}</p>
                </span>
            </div>
            <div class="col-4 themed-grid-col text-center">
                <h4 class="text-center">Owners</h4>
                <span>
                    <i class="fa-solid fa-house-user fa-3x"></i>
                    <p class="d-inline display-5">{{ count($profileOwners) }}</p>
                </span>
            </div>
            <div class="col-4 themed-grid-col text-center">
                <h4 class="text-center">Restaurants</h4>
                <span>
                    <i class="fa-solid fa-utensils fa-3x"></i>
                    <p class="d-inline display-5">{{ count($restaurants) }}</p>
                </span>
            </div>
         </div>
        <div class="row mb-3 border">
                <div class="col-6 themed-grid-col text-center">
                    <h4 class="text-center">Reviews</h4>
                    <span>
                        <i class="fa-solid fa-clipboard fa-3x"></i>
                        <p class="d-inline display-5">{{ count($reviews) }}</p>
                    </span>
                </div>
                <div class="col-6 themed-grid-col text-center">
                    <h4 class="text-center">Reservations</h4>
                    <span>
                    <i class="fa-solid fa-calendar-check fa-3x"></i>
                    <p class="d-inline display-5">{{ count($reservations) }}</p>
                </span>
            </div>
        </div>

    {{-- Monthly reports --}}
        <div class="row border mb-3 ">
            <div class="col-4 themed-grid-col">
                <h4 class="text-center">Users</h4>
                <canvas id="userChart"></canvas>
            </div>
            <div class="col-4 themed-grid-col">
                <h4 class="text-center">Owners</h4>
                <canvas id="ownersChart"></canvas>
            </div>
            <div class="col-4 themed-grid-col">
                <h4 class="text-center">Restaurants</h4>
                <canvas id="restaurantsChart"></canvas>
          </div>
      </div>

    <div class="row mb-3 border w-75 mx-auto">
        <div class="col-6 themed-grid-col">
            <h4 class="text-center">Reviews</h4>
            <canvas id="reviewsChart"></canvas>
        </div>
        <div class="col-6 themed-grid-col">
            <h4 class="text-center">Reservations</h4>
            <canvas id="reservationsChart"></canvas>
        </div>
    </div>

    {{-- Nationality --}}
    <div class="container border">
        <h4 class="text-center">Nationality</h4>
        <canvas id="nationalityChart"></canvas>

    </div>
</div>
@endsection
