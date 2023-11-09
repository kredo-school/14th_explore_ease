@extends('layouts.app')

@section('content')
     {{-- profile page --}}
    <div class="profile container w-75">
        <div class="row mt-2 p-2">
            <i class="fa-solid fa-user icon-user"></i>
        </div>
        <div class="display-5 m-4">Lionel Messi</div>
        
        <div class="vertical-line mt-4">
            <h3>5</h3><p class="p-1">Restaurant</p>
        </div>
        <div class="vertical-line mt-4">
            <h3>5</h3><p class="p-1">Resevation</p>
        </div>
        <div class="vertical-line mt-4">
            <h3>5</h3><p class="p-1">Reviews</p>
        </div>
        <div class="vertical-line mt-4">
            <h3>5</h3><p class="p-1">Bookmarks</p>
        </div>
    </div>
    
    {{-- profile list --}}
    
    <form method="POST" action="#">
        @csrf
        <div class="container w-75 mt-4 mx-auto">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item"> Profile </a>
                        <a href="#" class="list-group-item"> Reservation </a>
                        <a href="#" class="list-group-item"> Reviews </a>
                        <a href="#" class="list-group-item"> Bookmarks </a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row ">
                        <div class="col-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-secondary">Edit Profile    
                                <i class="fa-solid fa-pen-to-square icon-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row ">
                            <div class="col-6">
                                <label for="firstname" class="col-md-4 col-form-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                            <div class="col-6">
                                <label for="lastname" class="col-md-4 col-form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col">
                                <label for="username">Nationality</label>
                                <input type="country" class="form-control" name="nationality" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection