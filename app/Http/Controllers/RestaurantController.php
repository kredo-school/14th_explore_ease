<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant;
    private $review;

    public function __construct(Restaurant $restaurant, Review $review){
        $this -> restaurant = $restaurant;
        $this -> review = $review;
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

    /** Show restaurant ranking page */
    public function restaurantRanking(){
        return view('restaurant.ranking');
    }

    /** Show restaurant ranking page */
    public function ShowRestaurantDetail($id){
        $restaurant = $this->restaurant->findOrFail($id);

        return view('restaurant.detail')->with('restaurant', $restaurant);
    }
}
