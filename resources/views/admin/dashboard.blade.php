@extends('layouts.app')

@section('content')

<!-- Chart.js for graph -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
@vite(['resources/js/dashboard_graph.js'])
<<<<<<< HEAD

@section('content')
=======
>>>>>>> da1c98692444e330505a25217d64d6d33544b287

<div class="container w-75">
  <h2 class="mt-5">Dashboards</h2>
{{-- Number of users, reviews, and reservations --}}
        <div class="row border border-bottom-0 mt-3 py-3 px-5">
            <div class="col-4 themed-grid-col text-center border-end">
                <span class="border-right">
                <h5 class="text-center">Users</h5>
                <span>
                    <i class="fa-solid fa-circle-user fa-3x  text-secondary"></i>
                    <p class="d-inline display-5 ps-2">{{ count($profileUsers) }}</p>
                </span>
            </div>
            <div class="col-4 themed-grid-col text-center border-end">
                <h5 class="text-center">Owners</h5>
                <span>
                    <i class="fa-solid fa-house-user fa-3x  text-secondary"></i>
                    <p class="d-inline display-5 ps-2">{{ count($profileOwners) }}</p>
                </span>
            </div>
            <div class="col-4 themed-grid-col text-center">
                <h5 class="text-center">Restaurants</h5>
                <span>
                    <i class="fa-solid fa-utensils fa-3x  text-secondary"></i>
                    <p class="d-inline display-5 ps-2">{{ count($restaurants) }}</p>
                </span>
            </div>
         </div>
        <div class="row border border-bottom-0 py-3 px-5">
                <div class="col-6 themed-grid-col text-center border-end">
                    <h5 class="text-center">Reviews</h5>
                    <span>
                        <i class="fa-solid fa-clipboard fa-3x  text-secondary"></i>
                        <p class="d-inline display-5 ps-2">{{ count($reviews) }}</p>
                    </span>
                </div>
                <div class="col-6 themed-grid-col text-center">
                    <h5 class="text-center">Reservations</h5>
                    <span>
                    <i class="fa-solid fa-calendar-check fa-3x  text-secondary"></i>
                    <p class="d-inline display-5 ps-2">{{ count($reservations) }}</p>
                </span>
            </div>
        </div>

    {{-- Monthly reports --}}
        <div class="row border border-bottom-0 py-5">
            <div class="col-4 themed-grid-col">
                <h5 class="text-center">Users</h5>
                <canvas id="userChart"></canvas>
            </div>
            <div class="col-4 themed-grid-col">
                <h5 class="text-center">Owners</h5>
                <canvas id="ownersChart"></canvas>
            </div>
            <div class="col-4 themed-grid-col">
                <h5 class="text-center">Restaurants</h5>
                <canvas id="restaurantsChart"></canvas>
          </div>
      </div>

        <div class="row py-5 border border-bottom-0">
            <div class="col-6 themed-grid-col">
                <h5 class="text-center">Reviews</h5>
                <canvas id="reviewsChart"></canvas>
            </div>
            <div class="col-6 themed-grid-col">
                <h5 class="text-center">Reservations</h5>
                <canvas id="reservationsChart"></canvas>
            </div>
        </div>

        {{-- Nationality --}}
        <div class="row border py-5">
            <h5 class="text-center">Nationality</h5>
            <canvas id="nationalityChart"></canvas>

        </div>
</div>

<script>
var ctx = document.getElementById("userChart").getContext('2d');
var userChart = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: {!! json_encode($labels) !!},
        datasets: {!! json_encode($datasets) !!}
      },
})
</script>
@endsection
