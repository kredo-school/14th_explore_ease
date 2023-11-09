@extends('layouts.app')

@section('content')
{{-- Profile editing page modal--}}
<div class="modal fade" id="editProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Profile </h5>
            </div>

            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="container w-75">


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
                </form>
            </div>
        </div>        
    </div>


</div>


@endsection