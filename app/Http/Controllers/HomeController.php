<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function restaurantDetail(){
        return view('restaurant.detail');
    }

    public function restaurants(){
        return view('restaurants.show');
    }

    public function profileBase(){
        return view('users/profile');
    }

    public function restaurantReview(){
        return view('restaurant.review');
    }

    public function profileReservation(){
        return view('users.profilereservation');
    }

    public function restaurantsRanking(){
        return view('restaurants.ranking');
    }

    public function profileReview(){
        return view('users.profile_review');
    }
}
