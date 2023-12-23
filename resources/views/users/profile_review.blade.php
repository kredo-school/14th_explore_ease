@extends('layouts.app')

@section('content')

    <!-- jQuery -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}


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

                {{-- review list --}}
                <div class="col-9">
                    <div class="row ">
                        <div class="col-6">
                            <h1>Review</h1>
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
                                    <th>Review Comment</th>
                                    <th>Rating</th>
                                    <th>Date Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    @if($review->user_id == Auth::user()->id)
                                        <tr style="vertical-align: middle;">
                                            <td>{{$review->restaurant->name}}</td>
                                            <td>
                                                <div class="myClass">
                                                    <p id="overflow_text">{{$review->comment}}</p>
                                                    <span onClick="textLimiter()" id="toggle_text">Read More</span>
                                                </div>
                                            </td>
                                            <td>{{ $review->star }} <i class="fa-solid fa-star"></i></td>
                                            <td>{{ $review->updated_at }}</td>
                                            <td>
                                                <a href="#" class="btn b-color">Edit</a>
                                            </td>
                                            <td>
                                                {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                                <button class="btn b-color">
                                                    Delete
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
                <div class="d-flex justify-content-center">
                    {{ $reviews->links() }}
                </div>
                
            </div>
        </div>


@vite(['resources/js/textlimit.js'])
@endsection
