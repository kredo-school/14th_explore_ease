<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurant;

    public function __construct(Restaurant $restaurant){
        $this->restaurant = $restaurant;
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
        //validate request
        $request->validate([
            'restaurant_name' => 'required',
            'area' => 'required',
            'restaurant_address' => 'required',
            'Menu' => 'required',
            'seats' => 'required'
        ]);

        //store to the db
        $this->restaurant->name = $request->restaurant_name;
        $this->restaurant->areatype_id = $request->area;
        $this->restaurant->address = $request->restautrant_address;
        $this->restaurant->latitude = $request->restaurant_latitude;
        $this->restaurant->longitude = $request->restaurant_longitude;
        $this->restaurant->
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
