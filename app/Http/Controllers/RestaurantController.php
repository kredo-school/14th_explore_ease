<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\RestaurantPhoto;
use App\Models\FoodType;
use App\Models\AreaType;
use App\Models\FeatureType;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant;
    private $review;
    private $restaurantphoto;
    private $foodtype;
    private $areatype;
    private $featuretype;

    public function __construct(Restaurant $restaurant, Review $review, RestaurantPhoto $restaurantphoto, FoodType $foodtype, AreaType $areatype, FeatureType $featuretype){
        $this -> restaurant = $restaurant;
        $this -> review = $review;
        $this -> restaurantphoto = $restaurantphoto;
        $this -> foodtype = $foodtype;
        $this -> areatype = $areatype;
        $this -> featuretype = $featuretype;
    }

    /** Show restaurant ranking page */
    public function restaurantRanking(){
        return view('restaurant.ranking');
    }

    /** Show restaurant detail page */
    public function ShowRestaurantDetail($id){
        $restaurant = $this->restaurant->findOrFail($id);
        $restaurantphoto = $restaurant->restaurant_photos;
                         //↑restaurant Model.    //↑function on restaurant Model.
        $foodtype = $this->foodtype->findOrFail($restaurant->foodtype->id);
        $areatype = $this->areatype->findOrFail($restaurant->areatype->id);
        // $featuretype = $this->featuretype->findOrFail($restaurant->featuretype->id);


        return view('restaurant.detail')->with('restaurant', $restaurant)->with('restaurantphoto', $restaurantphoto)->with('foodtype', $foodtype)->with('areatype', $areatype);
    // ->with('featuretype', $featuretype)
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
