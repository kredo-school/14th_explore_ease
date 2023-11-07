@extends('layouts.app')

@section('title', 'restaurants.detail')

@section('content')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

<main class="container">
    <div class="row justify-content-center">
        <h1>REVIEWING</h1>

        <!--Star rating area -->
        <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-3 my-3">
                        <a href="" class="ms-5">
                            <i class="fa-solid fa-circle-user text-dark" style="font-size:15em;"></i>
                        </a>
                    </div>

                    <div class="col-3 my-auto">
                        <h2>UserName</h2>
                    </div>

                    <div class="col-6 my-auto text-start">
                        <div>
                            <h2>Start your review of <a href="#" style="color:pink" class="text-decoration-none"> Restaurant Name </a></h2>
                        </div>
                        <br>
                        <div>
                            <a href=""><i class="fa-regular fa-star text-dark" style="font-size:4em;"></i></a>
                            <a href=""><i class="fa-regular fa-star text-dark" style="font-size:4em;"></i></a>
                            <a href=""><i class="fa-regular fa-star text-dark" style="font-size:4em;"></i></a>
                            <a href=""><i class="fa-regular fa-star text-dark" style="font-size:4em;"></i></a>
                            <a href=""><i class="fa-regular fa-star text-dark" style="font-size:4em;"></i></a>
                        </div>
                        <br>
                        <div>
                            <h3>Select rating</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Comment area -->
        <div class="mt-5">
            <h3>COMMENT AREA</h3>
            <textarea name="" id="" rows="10" class="w-100 bg-transparent"></textarea>
            <div class="row justify-content-center mt-3">
                <div class="col-6 text-end">
                    <button type="submit" class="btn btn-light btn-outline-dark" style="width: 30%">Cancel</button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-secondary" style="width: 30%">Post</button>
                </div>
            </div>
        </div>

        <!--Review total area -->
        <div class="mt-5">
            <div class="row justify-content-center">

                <!--Graph -->
                <div class="col-6">
                    <canvas id="myChart" class="h-75"></canvas>

                    <!-- Pass data to Chart.js -->
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'horizontalBar',
                            data: {
                                labels: ['5', '4', '3', '2', '1'],
                                datasets: [{
                                    label: '',
                                    data: [25, 10, 5, 2, 20],
                                    backgroundColor: '#E7DA3D',
                                    borderColor: '#E7DA3D',

                                }]
                            },
                            options: {
                                legend: {
                                display: false,
                                },
                            },
                        });
                    </script>
                </div>

                <!--Number -->
                <div class="col-3 text-center">
                    <div>
                        <span style="font-size: 6rem;">3.9</span>
                    </div>
                    <div>
                        <a href="" class="text-decoration-none"><i class="fa-regular fa-star text-dark" style="font-size:2em;"></i>
                        <a href="" class="text-decoration-none"><i class="fa-regular fa-star text-dark" style="font-size:2em;"></i>
                        <a href="" class="text-decoration-none"><i class="fa-regular fa-star text-dark" style="font-size:2em;"></i>
                        <a href="" class="text-decoration-none"><i class="fa-regular fa-star text-dark" style="font-size:2em;"></i>
                        <a href="" class="text-decoration-none"><i class="fa-regular fa-star text-dark" style="font-size:2em;"></i>
                    </div>
                    <div class="mt-1">
                        <p style="font-size: 1.5rem;" class="text-decoration-none text-dark">
                            <span>225</span> reviews
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>


</main>

@endsection
