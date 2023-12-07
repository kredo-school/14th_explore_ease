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
use App\Models\FeatureType;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{

    private $restaurant;
    private $review;
    private $restaurantphoto;
    private $foodtype;
    private $areatype;
    private $feature;
    private $featuretype;
    private $budget;
    private $user;
    private $profile;
    private $openHour;

    public function __construct(Restaurant $restaurant, Review $review, RestaurantPhoto $restaurantphoto, FoodType $foodtype, AreaType $areatype, Feature $feature, FeatureType $featuretype, Budget $budget, User $user, Profile $profile, OpenHour $openHour,){
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->restaurantphoto = $restaurantphoto;
        $this->foodtype = $foodtype;
        $this->areatype = $areatype;
        $this->feature = $feature;
        $this->featuretype = $featuretype;
        $this->budget = $budget;
        $this->user = $user;
        $this->profile = $profile;
        $this->openHour = $openHour;
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
        $review = Review::where('restaurant_id', $restaurant->id)->latest()->paginate(10);
        $foodtype = $this->foodtype->findOrFail($restaurant->foodtype->id);
        $areatype = $this->areatype->findOrFail($restaurant->areatype->id);
        $user = $this->user->findOrFail(Auth::user()->id);
        $profile = $user->profile;

        /** FeatureTypes via Features table */
        $restaurantFeatures = $restaurant->features; // Gets all the features of the restaurant
            $featureTypes = []; // Declaration of the featureTypes that we'll populate below;
            foreach($restaurantFeatures as $feature){
            // For each feature of the restaurant, we get the featuretype name and add it to the array
                $featureTypes[] = $feature->featuretype->name;
            }

        /** Timezone from Budget table */
        $budgets = $restaurant->budgets;
            $Timezones = [];
            foreach ($budgets as $budgetItem) {
                $Timezones[] = $budgetItem->timezonetype;
            }
        $timezonesUnique = array_unique($Timezones);
        $sumTimezones = array_sum($timezonesUnique);

        /** Bugetvalue from Budget table */
            /** Lunch */
            $budgetLunch = Budget::where('restaurant_id', $restaurant->id)->where('timezonetype', 1)->get();
                $LunchValues = [];
                foreach ($budgetLunch as $budgetItemLunch) {
                    $LunchValues[] = $budgetItemLunch->budgetvalue;
                }

            /** Dinner */
            $budgetDinner = Budget::where('restaurant_id', $restaurant->id)->where('timezonetype', 1)->get();
                $DinnerValues = [];
                foreach ($budgetDinner as $budgetItemDinner) {
                    $DinnerValues[] = $budgetItemDinner->budgetvalue;
                }


        /** Opening and Closing hours*/
            // Monday
            $allOpenHours1 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 1)->get();
            $openHours1 = [];
            foreach ($allOpenHours1 as $openHour1){
                $openHours1[] = $openHour1;
            }
            // Tuesday
            $allOpenHours2 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 2)->get();
            $openHours2 = [];
            foreach ($allOpenHours2 as $openHour2){
                $openHours2[] = $openHour2;
            }
            // Wednesday
            $allOpenHours3 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 3)->get();
            $openHours3 = [];
            foreach ($allOpenHours3 as $openHour3){
                $openHours3[] = $openHour3;
            }
            // Thursday
            $allOpenHours4 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 4)->get();
            $openHours4 = [];
            foreach ($allOpenHours4 as $openHour4){
                $openHours4[] = $openHour4;
            }
            // Friday
            $allOpenHours5 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 5)->get();
            $openHours5 = [];
            foreach ($allOpenHours5 as $openHour5){
                $openHours5[] = $openHour5;
            }
            // Saturday
            $allOpenHours6 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 6)->get();
            $openHours6 = [];
            foreach ($allOpenHours6 as $openHour6){
                $openHours6[] = $openHour6;
            }
            // Sunday
            $allOpenHours0 = OpenHour::where('restaurant_id', $restaurant->id)->where('daytype', 0)->get();
            $openHours0 = [];
            foreach ($allOpenHours0 as $openHour0){
                $openHours0[] = $openHour0;
            }

        /** Call $averageAllStars from ReviewController */
        $reviewController = new ReviewController(
            new Restaurant(),
            new Review(),
            new User(),
            new Profile(),
        );
        $reviewData = $reviewController->ShowRestaurantReview($id)->getData();
            $averageAllStars = [];
            foreach ($reviewData as $averageAllStar) {
                $averageAllStars[] = $averageAllStar;
            }

        return view('restaurant.detail',
        [
            'restaurant' => $restaurant,
            'restaurantphoto' => $restaurantphoto,
            'review' => $review,
            'foodtype' => $foodtype,
            'areatype' => $areatype,
            'featureTypes' => $featureTypes,
            'sumTimezones' => $sumTimezones,
            'LunchValues' => $LunchValues,
            'DinnerValues' => $DinnerValues,
            'averageAllStar' => $averageAllStar,
            'user' => $user,
            'profile' => $profile,
            'openHours1' => $openHours1,
            'openHours2' => $openHours2,
            'openHours3' => $openHours3,
            'openHours4' => $openHours4,
            'openHours5' => $openHours5,
            'openHours6' => $openHours6,
            'openHours0' => $openHours0,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = $this->restaurant->all();
        $restaurant_photos = [];
        $features = [];
        $finalBudget = [];

        foreach($restaurants as $restaurant){
            $data = $this->restaurantphoto->where('restaurant_id', $restaurant->id)->get();
            array_push($restaurant_photos, $data);


            $fdata = $this->feature->where('restaurant_id', $restaurant->id)->get();
            array_push($features, $fdata);

            $bdata = $this->budget->where('restaurant_id', $restaurant->id)->get();
            array_push($finalBudget, $bdata);
        }


        return view('restaurant.show', ['restaurants'
        =>$restaurants, 'restaurant_photos'=>$restaurant_photos, 'features'=>$features, 'finalBudget'=>$finalBudget]);
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
        if($request->seat == "available"){
            $seat->restaurant_id = $restaurant->id;
            $seat->reservation_minutes = 60;
            $seat->save();
        }

        for($i = 0; $i < 3; $i++){
            if($request->{"photo_".$i+1}){
                $restaurant_photo = new RestaurantPhoto();
                $restaurant_photo->restaurant_id = $restaurant->id;
                if($i == 0){
                    $restaurant_photo->name = "First photo";
                } elseif($i == 1){
                    $restaurant_photo->name = "Second photo";
                } elseif($i == 2){
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
                $budget->timezonetype = "1";
                $budget->budgetindex = $i+1;
                if($i == 0){
                    $budget->budgetvalue = "￥";
                } elseif ($i == 1){
                    $budget->budgetvalue = "￥￥";
                } elseif ($i == 2){
                    $budget->budgetvalue = "￥￥￥";
                } elseif ($i == 3){
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
                $budget->timezonetype = "2";
                $budget->budgetindex = $i+1;
                if($i == 0){
                    $budget->budgetvalue = "￥";
                } elseif ($i == 1){
                    $budget->budgetvalue = "￥￥";
                } elseif ($i == 2){
                    $budget->budgetvalue = "￥￥￥";
                } elseif ($i == 3){
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

    /**
     * Search restaurants and return list.
     */
    public function search(Request $request)
    {
        $keyword = $request->search;

        $totalList = DB::table('restaurants')
                ->where('name', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%")
                ->orWhere('address', 'like', "%{$keyword}%")
                ->get();

        return $totalList;
    }
}
