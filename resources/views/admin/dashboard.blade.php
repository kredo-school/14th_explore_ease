@extends('layouts.app')

@section('content')

<div class="container w-50">
<h2>Dashboards</h2>
{{-- Number of users, reviews, and reservations --}}

    <div class="row border">
        <div class="col-4 themed-grid-col">
            <h4>Users</h4>
            <span>
                <i class="fa-solid fa-circle-user fs-5"></i>
                <p class="d-inline">19,281</p>
            </span>
        </div>
        <div class="col-4 themed-grid-col">
            <h4>Owners</h4>
            <span>
                <i class="fa-solid fa-house-user fs-5"></i>
                <p class="d-inline">4,698</p>
            </span>
        </div>
        <div class="col-4 themed-grid-col">
            <h4>Restaurants</h4>
            <span>
                <i class="fa-solid fa-utensils fs-5"></i>
                <p class="d-inline">5,289</p>
            </span>
        </div>
        </div>
        
        <div class="row mb-3 border">
            <div class="col-6 themed-grid-col">
                <h4>Reviews</h4>
                <span>
                    <i class="fa-solid fa-clipboard fs-5"></i>
                    <p class="d-inline">289,543</p>
                </span>
            </div>
            <div class="col-6 themed-grid-col">
                <h4>Reservations</h4>
                <span>
                <i class="fa-solid fa-calendar-check fs-5"></i>
                <p class="d-inline">156,987</p>
            </span>
        </div>
    </div>

    {{-- Monthly reports --}}

    <div class="row border">
        <div class="col-4 themed-grid-col">
            <h4>Users</h4>
        {{-- graph area --}}
        </div>
        <div class="col-4 themed-grid-col">
            <h4>Owners</h4>
        {{-- graph area --}}
        </div>
        <div class="col-4 themed-grid-col">
            <h4>Restaurants</h4>
        {{-- graph area --}}
        </div>
    </div>
        
    <div class="row mb-3 border">
        <div class="col-6 themed-grid-col">
            <h4>Reviews</h4>

        </div>
        <div class="col-6 themed-grid-col">
            <h4>Reservations</h4>

        </div>
    </div>

    {{-- Nationality --}}
    <div class="container border">
        <h4>Nationality</h4>

        {{-- graph area --}}
    </div>
</div>
@endsection
