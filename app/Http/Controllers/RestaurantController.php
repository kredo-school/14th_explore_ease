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
        $restaurant->message = $request->message;

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

        for($i = 0; $i < 4; $i++)
        {
            if($request->{"course_photo".$i+1}){
                $course = new Course();
                $course->restaurant_id = $restaurant->id;
                $course->photo = 'data:image/' . $request->{"course_photo".$i+1}->extension().
                ';base64,'. base64_encode(file_get_contents($request->{"course_photo".$i+1}));
                $course->name = $request->{"course_name".$i+1};
                $course->description = $request->{"course_description".$i+1};
                $course->reservation_minutes = 60;
                $course->save();
            }
        }
        
        $seat = new Seat();
        if($request->seat = "available"){
            $seat->restaurant_id = $restaurant->id;
            $seat->reservation_minutes = 60;
            $seat->save();
        }

        for($i = 0; $i < 3; $i++){
            if($request->{"photo_".$i+1}){ 
                $restaurant_photo = new RestaurantPhoto();
                $restaurant_photo->restaurant_id = $restaurant->id;
                if($i = 0){
                    $restaurant_photo->name = "First photo";
                } elseif($i = 1){
                    $restaurant_photo->name = "Second photo";
                } elseif($i = 2){
                    $restaurant_photo->name = "Third photo";
                }
                $restaurant_photo->photo = 'data:image/' . $request->{"photo_".$i+1}->extension().
                ';base64,'. base64_encode(file_get_contents($request->{"photo_".$i+1}));

                $restaurant_photo->save();
            }
        }

        for($i = 0; $i < 4; $i++)
        {
            if($request->{"L_budget".$i+1}){
                $budget = new Budget();
                $budget->restaurant_id = $restaurant->id;
                $budget->timezonetype = "0";
                $budget->budgetindex = $i+1;
                if($i = 0){
                    $budget->budgetvalue = "￥";
                } elseif ($i=1){
                    $budget->budgetvalue = "￥￥";
                } elseif ($i=2){
                    $budget->budgetvalue = "￥￥￥";
                } elseif ($i=3){
                    $budget->budgetvalue = "￥￥￥￥";
                }

                $budget->save();
            }
        }

        for($i = 0; $i < 4; $i++)
        {
            if($request->{"D_budget".$i+1}){
                $budget = new Budget();
                $budget->restaurant_id = $restaurant->id;
                $budget->timezonetype = "1";
                $budget->budgetindex = $i+1;
                if($i = 0){
                    $budget->budgetvalue = "￥";
                } elseif ($i=1){
                    $budget->budgetvalue = "￥￥";
                } elseif ($i=2){
                    $budget->budgetvalue = "￥￥￥";
                } elseif ($i=3){
                    $budget->budgetvalue = "￥￥￥￥";
                }
                
                $budget->save();
            }
        }

        for($i = 0; $i < 7; $i++)
        {
            if($request->{"features".$i+1}){
                $feature = new Feature();
                $feature->restaurant_id = $restaurant->id;
                $feature->featuretype_id = $i+1;
                $feature->save();
            }
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
