<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\OpenHour;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{

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

        $days_of_week = [ 'Holidays', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        
        $restaurant = new Restaurant();
        //store to the db
        $restaurant->user_id = Auth::id();
        $restaurant->name = $request->restaurant_name;
        $restaurant->description = $request->description;
        $restaurant->menu = $request->menu;
        $restaurant->areatype_id = $request->area;
        $restaurant->address = $request->restautrant_address;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->foodtype_id = $request->foodtype;

        $restaurant->save();

        
        for($i = 0; $i < 8; $i++)
        {
            $openhour = new OpenHour();

            $openhour->restaurant_id = $restaurant->id;
            $openhour->daytype = $i;
            $openhour->openinghours = $request->input('open_' . $days_of_week[$i]);
            $openhour->closinghours = $request->input('close_' . $days_of_week[$i]);
            $openhour->closed = $request->has(`closed_checkbox_$days_of_week[$i]`);
            $openhour->save();
        }

        
        $course = new Course();
        $course->restaurant_id = $restaurant->id;
        $course->photo = 'data:image/' . $request->course_photo->extension().
        ';base64,'. base64_encode(file_get_contents($request->image));
        $course->name = $request->course_name;
        $course->description = $request->course_description;
        //$course->

        return redirect()->back();

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

    /** Show restaurant review page */
    public function restaurantReview(){
        return view('restaurant.review');
    }

    /** Show restaurant ranking page */
    public function restaurantRanking(){
        return view('restaurant.ranking');
    }

    /** Show restaurant ranking page */
    public function restaurantDetail(){
        return view('restaurant.detail');
    }
}
