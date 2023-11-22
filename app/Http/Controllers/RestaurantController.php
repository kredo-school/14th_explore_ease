<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\RestaurantPhoto;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant;
    private $review;
    private $restaurantphoto;

    public function __construct(Restaurant $restaurant, Review $review, RestaurantPhoto $restaurantphoto){
        $this -> restaurant = $restaurant;
        $this -> review = $review;
        $this -> restaurantphoto = $restaurantphoto;
    }

    /** Show restaurant ranking page */
    public function restaurantRanking(){
        return view('restaurant.ranking');
    }

    /** Show restaurant detail page */
    public function ShowRestaurantDetail($id){
        $restaurant = $this->restaurant->findOrFail($id);
        $restaurantphoto = RestaurantPhoto::where($id, 'restaurant_id');

        // $all_restaurantphotos = $this->restaurantphoto;

        // dd($id);

        return view('restaurant.detail')->with('restaurant', $restaurant)->with('restaurantphoto', $restaurantphoto);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restaurant.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant.adding');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }


}
