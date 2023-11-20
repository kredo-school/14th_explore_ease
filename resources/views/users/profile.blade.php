@extends('layouts.app')

@section('content')
     {{-- profile page --}}
    @include('users.header')

    {{-- profile list --}}
    
    <form method="POST" action="#">
        @csrf
        <div class="container w-75 mt-4 mx-auto">
            <div class="row justify-content-center">
                <div class="col-3">
                    @include('users.menu')
                </div>
                <div class="col-9">
                    <div class="row ">
                        <div class="col-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile    
                                <i class="fa-solid fa-pen-to-square icon-edit"></i>
                            </button>
                        </div>
                        {{-- profile_edit modal --}}
                        @include('users.modal.profile_edit')
                    </div>
                    <div class="row">
                        <div class="row ">
                            <div class="col-6">
                                <label for="firstname" class="col-md-4 col-form-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="{{ $user->profile->first_name }}">
                            </div>
                            <div class="col-6">
                                <label for="lastname" class="col-md-4 col-form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Messi">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Lionel">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="lionelmessi@gmail.com">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="09012345678">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="username">Nationality</label>
                                <input type="country" class="form-control" name="nationality" placeholder="Argentina">
                            </div>
                        </div>

                        {{-- Restaurant Profile for Owners --}}
                        <div class="row mt-5">
                            <div class="col-6">
                                <h1>Restaurant Profile</h1>
                            </div>
                            <div class="col-6 text-end">
                               <a href="#" class="btn btn-primary" role="button">Add Restaurant</a> 
                            {{-- {{ route('restaurant.adding') }}  <- will put instead of #--}}
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Restaurant Name</th>
                                        <th>Registration Date</th>
                                        <th>Rate</th>
                                        <th>Area</th>
                                        <th>Foodtype</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="vertical-align: middle">
                                        <td>Jyojyo-en Tokyo </td>
                                        <td>
                                            <p style="line-height:24px;" class="text-limit"></p>
                                        </td>
                                        <td>4.5 <i class="fa-solid fa-star"></i></td>
                                        <td>Tokyo</td>
                                        <td>Japanese</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                            <button class="btn btn-secondary">
                                            Delete
                                            </button>
                                        </td>
                                    </tr>
    
                                    <tr style="vertical-align: middle">
                                        <td>Gyoza-no-osho</td>
                                        <td>
                                            <p style="line-height:24px;" class="text-limit"></p>
                                        </td>
                                        <td>4.5 <i class="fa-solid fa-star"></i></td>
                                        <td>Tokyo</td>
                                        <td>Chinese</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                             {{-- <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}"> --}}
                                            <button class="btn btn-secondary">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection