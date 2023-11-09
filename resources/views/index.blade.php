@extends('layouts.app')

@section('content')
    {{-- MainV --}}
    <div class="main vh-100 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-lg-5 mx-auto my-5 text-white text-center">
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, magni?</h3>
                    
                    {{-- search form --}}
                    <form method="GET" action="http://www.google.co.jp/search" class="text-center">
                        <input type="search" name="search" class="btn btn-light btn-lg text-start" placeholder="Search">
                        {{-- search button --}}
                        <button type="submit" class="btn btn-light btn-lg" name="submit" alt="search" value="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
@endsection