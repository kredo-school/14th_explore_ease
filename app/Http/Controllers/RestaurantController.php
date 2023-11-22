<?php

namespace App\Http\Controllers;

use App\Models\AreaType;
use App\Models\Budget;
use App\Models\Course;
use App\Models\Feature;
use App\Models\FoodType;
use App\Models\OpenHour;
use App\Models\Restaurant;
use App\Models\RestaurantPhoto;
use App\Models\Review;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $areatype = new AreaType();
        $areatypes = $areatype->all();

        $foodtype = new FoodType();
        $foodtypes = $foodtype->all();

        return view('restaurant.adding')->with('areatypes', $areatypes)->with('foodtypes', $foodtypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $days_of_week = [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Holiday'];

        
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
        ';base64,'. base64_encode(file_get_contents($request->course_photo));
        $course->name = $request->course_name;
        $course->description = $request->course_description;
        $course->reservation_minutes = 60;
        $course->save();

        
        $seat = new Seat();
        if($request->seat = "available"){
            $seat->restaurant_id = $restaurant->id;
            $seat->reservation_minutes = 60;
            $seat->save();
        }

        for($i = 1; $i <= 3; $i++){
            if($request->photo_[$i]){ //ここどうやって条件分岐？
                $restaurant_photo = new RestaurantPhoto();
                $restaurant_photo->restaurant_id = $restaurant->id;
                $restaurant_photo->photo = 'data:image/' . $request->photo_[$i]->extension().
                ';base64,'. base64_encode(file_get_contents($request->photo_[$i]));

                $restaurant_photo->save();
            }
        }

        for($i = 1; $i <= 4; $i++)
        {
            $budget = new Budget();
            $budget->restaurant_id = $restaurant->id;
            $budget->timezonetype = $request->has(`L_budget$i`);
            $budget->save();
        }

        for($i = 1; $i <= 4; $i++)
        {
            $budget = new Budget();
            $budget->restaurant_id = $restaurant->id;
            $budget->timezonetype = $request->has(`D_budget$i`);
            $budget->save();
        }

        for($i = 1; $i <= 7; $i++)
        {
        $feature = new Feature();
        $feature->restaurant_id = $restaurant->id;
        $feature->featuretype_id = $request->has(`features$i`);
        $feature->save();
        }

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
