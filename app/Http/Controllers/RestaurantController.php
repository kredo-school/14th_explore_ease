<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\RestaurantPhoto;
use App\Models\FoodType;
use App\Models\AreaType;
use App\Models\Feature;
use App\Models\FeatureType;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant;
    private $review;
    private $restaurantphoto;
    private $foodtype;
    private $areatype;
    private $feature;
    private $featuretype;

    public function __construct(Restaurant $restaurant, Review $review, RestaurantPhoto $restaurantphoto, FoodType $foodtype, AreaType $areatype, Feature $feature, FeatureType $featuretype){
        $this -> restaurant = $restaurant;
        $this -> review = $review;
        $this -> restaurantphoto = $restaurantphoto;
        $this -> foodtype = $foodtype;
        $this -> areatype = $areatype;
        $this -> feature = $feature;
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

        // featuretype
        $feature = $restaurant->features;
        // dd($feature);



        // $feature = $this->restaurant->findOrFail($restaurant->id);
        // $all_features = $this->feature->all();
        // foreach ($all_features as $featuretype) {
        //     $featuretype[] = $feature->featuretype;
        // }
        // $all_featuretypes = $this->featuretype->all();

        return view('restaurant.detail')->with('restaurant', $restaurant)->with('restaurantphoto', $restaurantphoto)->with('foodtype', $foodtype)->with('areatype', $areatype);

        // return view('restaurant.detail')->with('restaurant', $restaurant)->with('restaurantphoto', $restaurantphoto)->with('foodtype', $foodtype)->with('areatype', $areatype)->with('feature', $feature)->with('featuretype', $featuretype)->with('all_features', $all_features)->with('all_featuretypes', $all_featuretypes);
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
