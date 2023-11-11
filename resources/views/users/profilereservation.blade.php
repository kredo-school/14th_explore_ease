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
                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>


                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>

                                <tr style="vertical-align: middle">
                                    <td>Restaurantname</td>
                                    <td>18:00-21:00<br>25/OCT/2023</td>
                                    <td>2 person</td>
                                    <td>Course 1</td>
                                    <td>¥16,000</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Edit</a>
                                    </td>
                                    <td>
                                        {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                        <button class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!--permanent_area-->
                        <div class="d-flex justify-content-center">
                            <a  class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<%preventry_url>">previous &lt;&lt;</a>
                        <!--nextentry-->
                            <a  class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover mx-5" href="<%nextentry_url>">&gt;&gt;next</a>
                        <!--/permanent_area-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
