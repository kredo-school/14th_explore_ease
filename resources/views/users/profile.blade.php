@extends('layouts.app')

@section('content')
    {{-- profile page --}}
    @include('users.header')

    {{-- profile list --}}
        <div class="container w-75 mt-4 mx-auto">
            <div class="row justify-content-center">
                <div class="col-3">
                    @include('users.menu')
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-6 text-end">
                            <button id="edit-btn" class="btn b-color" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile    
                                <i class="fa-solid fa-pen-to-square icon-edit"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-6">
                                    <label for="firstname" class="col-md-4 col-form-label">First Name</label>
                                    @if($user->profile != null && $user->profile->first_name)
                                        <input type="text" class="form-control" name="firstname" value="{{ $user->profile->first_name }}" disabled>
                                    @else
                                        <input type="text" class="form-control" name="firstname" disabled>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label for="lastname" class="col-md-4 col-form-label">Last Name</label>
                                    @if($user->profile != null && $user->profile->last_name)
                                        <input type="text" class="form-control" name="lastname" value="{{ $user->profile->last_name }}" disabled>
                                    @else
                                        <input type="text" class="form-control" name="lastname" disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ $user->name }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    @if($user->profile != null && $user->profile->phone)
                                        <input type="text" class="form-control" name="phone" value="{{ $user->profile->phone }}" disabled>
                                    @else
                                        <input type="text" class="form-control" name="phone" disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="nationality">Nationality</label>
                                    @if($user->profile != null && $user->profile->nationality)
                                        <input type="country" class="form-control" name="nationality" value="{{ $user->profile->nationality->name }}" disabled>
                                    @else
                                        <input type="country" class="form-control" name="nationality" disabled>
                                    @endif
                                </div>
                            </div>
                            @if($user->profile != null && $user->profile->usertype_id != null)
                                <div id="usertype-area" class="row">
                                    <div class="col">
                                        <label for="usertype">UserType</label>
                                        @if($user->profile->usertype_id == 1)
                                            <input type="text" class="form-control" name="usertype" value="Admin" disabled>
                                        @elseif ($user->profile->usertype_id == 2)
                                            <input type="text" class="form-control" name="usertype" value="User" disabled>
                                        @elseif ($user->profile->usertype_id == 3)
                                            <input type="text" class="form-control" name="usertype" value="Owner" disabled>
                                        @endif
                                    </div>
                                </div>
                            @endif
    
                            {{-- Restaurant Profile for Owners --}}
                            {{-- If user is an owner, the owner can see own restaurant profiles --}}
                            @if(Auth::user()->profile != null && Auth::user()->profile->usertype_id == 3)
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <h1>Restaurant Profile</h1>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="{{ route('restaurant.adding') }}" class="btn b-color" role="button">Add Restaurant</a> 
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
                                        {{-- display restaurants that the owner has with @foreach, @if --}}
                                        <tbody>
                                            @foreach($restaurants as $restaurant)
                                                @if($restaurant->user_id == Auth::user()->id)
                                                    <tr style="vertical-align: middle">
                                                        <td>{{ $restaurant->name }}</td>
                                                        <td>
                                                            <p style="line-height:24px;" class="text-limit">{{ $restaurant->updated_at }}</p>
                                                        </td>
                                                        <td>4.5<i class="fa-solid fa-star"></i></td>
                                                        <td>{{ $restaurant->address }}</td>
                                                        <td>{{ $restaurant->foodtype->name }}</td>
                                                        <td>
                                                            <a href="#" class="btn b-color">Edit</a>
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
                            @endif
                            <!--paginate_area-->
                            <div class= "d-flex justify-content-center">
                                {{ $restaurants->links() }}
                            </div>
                        </div>
                        {{-- profile_edit modal --}}
                        @include('users.modal.profile_edit')
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            window.onload = onLoad;

            // If user don't have profile, show the edit dialog forcely.
            function onLoad() {
                const editBtn = document.getElementById("edit-btn");
                const usertypeArea = document.getElementById("usertype-area");
                if (usertypeArea == null) {
                    editBtn.click();
                }
            }
        </script>
@endsection