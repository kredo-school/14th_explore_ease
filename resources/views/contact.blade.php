@extends('layouts.app')

@section('title', 'Cotact')

@section('content')

<div class="container justify-content-center w-50" style="padding-top: 7rem; padding-bottom: 12rem;">
    <h1 class="mt-5">Contact Us</h1>
    <div class="card p-4 position_control">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                <button type="submit" class="btn b-color">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection