@extends('layouts.app')

@section('content')

@section('styles')
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- FontAwsome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
@endsection

<div class="container w-75">
<h2>Dashbords</h2>
{{-- Number of users, reviews, and reservations --}}

        <div class="row border">
            <div class="col-4 themed-grid-col text-center">
                <h4 class="text-center">Users</h4>
                <span>
                    <i class="fa-solid fa-circle-user fa-3x"></i>
                    <p class="d-inline display-5">19,281</p>
                </span>
            </div>
            <div class="col-4 themed-grid-col text-center">
                <h4 class="text-center">Owners</h4>
                <span>
                    <i class="fa-solid fa-house-user fa-3x"></i>
                    <p class="d-inline display-5">4,698</p>
                </span>
            </div>
            <div class="col-4 themed-grid-col text-center">
                <h4 class="text-center">Restaurants</h4>
                <span>
                    <i class="fa-solid fa-utensils fa-3x"></i>
                    <p class="d-inline display-5">5,289</p>
                </span>
            </div>
         </div>
        <div class="row mb-3 border">
                <div class="col-6 themed-grid-col text-center">
                    <h4 class="text-center">Reviews</h4>
                    <span>
                        <i class="fa-solid fa-clipboard fa-3x"></i>
                        <p class="d-inline display-5">289,543</p>
                    </span>
                </div>
                <div class="col-6 themed-grid-col text-center">
                    <h4 class="text-center">Reservations</h4>
                    <span>
                    <i class="fa-solid fa-calendar-check fa-3x"></i>
                    <p class="d-inline display-5">156,987</p>
                </span>
            </div>
        </div>


        {{-- Monthly reports --}}

    <div class="row border mb-3 ">
        <div class="col-4 themed-grid-col">
            <h4 class="text-center">Users</h4>

        <canvas id="myBarChart"></canvas>
      <script>
      var ctx = document.getElementById("myBarChart");
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
          {
              label: 'users',
              data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
              backgroundColor: "rgba(255,183,76,0.5)"
            }
          ]
        },
        options: {
          title: {
            display: true,
          },
          scales: {
            yAxes: [{
              ticks: {
                suggestedMax: 100,
                suggestedMin: 0,
                stepSize: 10,
                callback: function(value, index, values){
                  return  value
                }
              }
            }]
          },
        }
      });
      </script>
        </div>
        <div class="col-4 themed-grid-col">
            <h4 class="text-center">Owners</h4>
            <canvas id="OwnersChart"></canvas>
            <script>
            var ctx = document.getElementById("OwnersChart");
            var myBarChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                {
                    label: 'Owners',
                    data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
                    backgroundColor: "rgba(255,183,76,0.5)"
                  }
                ]
              },
              options: {
                title: {
                  display: true,
                },
                scales: {
                  yAxes: [{
                    ticks: {
                      suggestedMax: 100,
                      suggestedMin: 0,
                      stepSize: 10,
                      callback: function(value, index, values){
                        return  value
                      }
                    }
                  }]
                },
              }
            });
            </script>
        </div>
        <div class="col-4 themed-grid-col">
            <h4 class="text-center">Restaurants</h4>
            <canvas id="RestaurantsChart"></canvas>
            <script>
            var ctx = document.getElementById("RestaurantsChart");
            var myBarChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                {
                    label: 'Restaurant pages',
                    data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
                    backgroundColor: "rgba(255,183,76,0.5)"
                  }
                ]
              },
              options: {
                title: {
                  display: true,
                },
                scales: {
                  yAxes: [{
                    ticks: {
                      suggestedMax: 100,
                      suggestedMin: 0,
                      stepSize: 10,
                      callback: function(value, index, values){
                        return  value
                      }
                    }
                  }]
                },
              }
            });
            </script>
    </div>
</div>

<div class="row mb-3 border w-75 mx-auto">
    <div class="col-6 themed-grid-col">
        <h4 class="text-center">Reviews</h4>
        <canvas id="ReviewsChart"></canvas>
        <script>
        var ctx = document.getElementById("ReviewsChart");
        var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
            {
                label: 'Number of reviews',
                data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
                backgroundColor: "rgba(255,183,76,0.5)"
              }
            ]
          },
          options: {
            title: {
              display: true,
            },
            scales: {
              yAxes: [{
                ticks: {
                  suggestedMax: 100,
                  suggestedMin: 0,
                  stepSize: 10,
                  callback: function(value, index, values){
                    return  value
                  }
                }
              }]
            },
          }
        });
        </script>
        
    </div>
    <div class="col-6 themed-grid-col">
        <h4 class="text-center">Reservations</h4>
        <canvas id="ReservationsChart"></canvas>
        <script>
        var ctx = document.getElementById("ReservationsChart");
        var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
            {
                label: 'Number of booking',
                data: [55, 45, 73, 75, 41, 45, 58, 73, 75, 41, 45, 58],
                backgroundColor: "rgba(255,183,76,0.5)"
              }
            ]
          },
          options: {
            title: {
              display: true,
            },
            scales: {
              yAxes: [{
                ticks: {
                  suggestedMax: 100,
                  suggestedMin: 0,
                  stepSize: 10,
                  callback: function(value, index, values){
                    return  value
                  }
                }
              }]
            },
          }
        });
        </script>

        </div>
    </div>

    {{-- Nationality --}}
    <div class="container border">
        <h4 class="text-center">Nationality</h4>
        <canvas id="NationalityChart"></canvas>
        <script>
        var ctx = document.getElementById("NationalityChart");
        var myBarChart = new Chart(ctx, {
            type: 'horizontalBar',
          data: {
            labels: ['AU', 'CU', 'KR', 'BE', 'CN', 'FI', 'SE', 'UK', 'US', 'PH', 'DK', 'CA'],
            datasets: [
            {
                label: 'number of people',
                data: [500, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000],
                backgroundColor: "rgba(255,183,76,0.5)"
              }
            ]
          },
          options: {
            title: {
              display: true,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMax: 100,
                        suggestedMin: 0,
                        stepSize: 10,
                  callback: function(value, index, values){
                    return  value
                  }
                }
              }]
            },
          }
        });
        </script>
    </div>
</div>

@endsection
