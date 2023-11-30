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
        // prevent from authentication on every view
        // $this->middleware('auth');
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

    public function restaurants(){
        return view('restaurants.show');
    }


    public function profileReservation(){
        return view('users.profilereservation');
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }


    public function profileReview(){
        return view('users.profile_review');
    }
}
