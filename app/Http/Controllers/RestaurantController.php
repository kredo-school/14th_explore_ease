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
    private $course;
    private $all_courses;

    public function __construct(Restaurant $restaurant, Review $review, RestaurantPhoto $restaurantphoto, FoodType $foodtype, AreaType $areatype, Feature $feature, FeatureType $featuretype, Budget $budget, User $user, Profile $profile, OpenHour $openHour,Course $course){
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
        $this->course = $course;
    }

    /** Show restaurant ranking page */
    public function restaurantRanking(){
        $restaurants = $this->restaurant->all();
        $restaurant_photos = [];
        $features = [];
        $finalBudget = [];
        $stars = [];

        $restaurant_names = [];
        $restaurant_addresses = [];
        $restaurant_id = [];

        $timezoneLunch = [];
        $timezoneDinner = [];

        foreach($restaurants as $restaurant){
            //get data from restaurantPhoto table, feature table, budget table.
                $data = $this->restaurantphoto->where('restaurant_id', $restaurant->id)->get();
                array_push($restaurant_photos, $data);

                $fdata = $this->feature->where('restaurant_id', $restaurant->id)->get();
                array_push($features, $fdata);

                $bdata = $this->budget->where('restaurant_id', $restaurant->id)->get();
                array_push($finalBudget, $bdata);

            //get rating data from review table, then calculate the average of stars.
                $sdata = $this->review->where('restaurant_id', $restaurant->id)->get()->pluck('star')->toArray();
                $sdatalength = count($sdata);
                $sdatasum = array_sum($sdata);
                $sdatasum /= $sdatalength;
                array_push($stars, $sdatasum);

            //get data from restaurant table.
                $restaurant_names[] = $restaurant->name;
                $restaurant_addresses[] = $restaurant->address;
                $restaurant_id[] = $restaurant->id;

            //get timezone data from budget table for if component on blade.php.
                // lunch
                $Ldata = $this->budget->where('restaurant_id', $restaurant->id)->where('timezonetype', 1)->get()->pluck('timezonetype')->toArray();
                array_push($timezoneLunch, $Ldata);
                // Dinner
                $Ddata = $this->budget->where('restaurant_id', $restaurant->id)->where('timezonetype', 2)->get()->pluck('timezonetype')->toArray();
                array_push($timezoneDinner, $Ddata);
        }
        // dd($timezoneLunch);

        array_multisort($stars, SORT_DESC, $restaurant_photos, $features, $finalBudget, $restaurant_names, $restaurant_addresses, $restaurant_id, $timezoneLunch, $timezoneDinner);

        return view('restaurant.ranking',
        [
            'restaurants'=>$restaurants,
            'restaurant_photos'=>$restaurant_photos,
            'features'=>$features,
            'finalBudget'=>$finalBudget,
            'stars'=>$stars,
            'restaurant_names'=>$restaurant_names,
            'restaurant_addresses'=>$restaurant_addresses,
            'restaurant_id'=>$restaurant_id,
            'timezoneLunch'=>$timezoneLunch,
            'timezoneDinner'=>$timezoneDinner,
        ]);
    }

    /** Show restaurant detail page */
    public function ShowRestaurantDetail($id){
        $restaurant = $this->restaurant->findOrFail($id);
        $restaurantphoto = $restaurant->restaurant_photos;
                         //↑restaurant Model.    //↑function on restaurant Model.
        $review = Review::where('restaurant_id', $restaurant->id)->latest()->paginate(10);
        $foodtype = $this->foodtype->findOrFail($restaurant->foodtype->id);
        $areatype = $this->areatype->findOrFail($restaurant->areatype->id);
        if (Auth::check()) {
            $user = $this->user->findOrFail(Auth::user()->id);
            $profile = $user->profile;
        } else {
            $user = new User();
            $profile = new Profile();
        }

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

        /** Course */
        $course =  $this->course->findOrFail($id);
        $all_courses = $restaurant->courses->all();

        /** Main menu */


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
            'course' => $course,
            'all_courses' => $all_courses,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $restaurant = [];
        if ($keyword == null || $keyword == "") {
            $restaurants = $this->restaurant->all();
        } else {
            $restaurants = $this->restaurant
                    ->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('address', 'like', "%{$keyword}%")
                    ->get();
        }

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

        return view('restaurant.show',
            [
                'restaurants' => $restaurants,
                'restaurant_photos' => $restaurant_photos,
                'features' => $features,
                'finalBudget'=> $finalBudget
            ]);
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
                $budget->budgetvalue = str_repeat("￥", ($i + 1));
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
                $budget->budgetvalue = str_repeat("￥", ($i + 1));
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
    public function edit($id)
    {
        $restaurant = $this->restaurant->findOrFail($id);

        $areatype = new AreaType();
        $areatypes = $areatype->all();

        $foodtype = new FoodType();
        $foodtypes = $foodtype->all();

        $features = new Feature();
        $features = $features->all();

        $openhour = new OpenHour();
        $openhours = $openhour->where('restaurant_id', $id)->get();

        $course = new Course();
        $courses = $course->where('restaurant_id', $id)->get();

        $s_feature = new Feature();
        $s_features = $s_feature->where('restaurant_id', $id)->get();
        

        // dd($openhours[1]->openinghours);

        return view('restaurant.edit')->with('areatypes', $areatypes)->with('foodtypes', $foodtypes)->with('restaurant', $restaurant)->with('openhours', $openhours)
        ->with('courses', $courses)->with('s_features', $s_features)->with('features', $features);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->restaurant = 

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
                $budget->budgetvalue = str_repeat("￥", ($i + 1));
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
                $budget->budgetvalue = str_repeat("￥", ($i + 1));
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->restaurant->destroy($id);
        return redirect()->back();
    }
}
