<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Profile;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\AreaType;
use App\Models\FoodType;

class AdminController extends Controller
{
    private $profile;
    private $user;
    private $restaurant;
    private $review;
    private $reservation;
    private $areaType;
    private $foodType;


    public function __construct(Profile $profile, Restaurant $restaurant, Review $review, Reservation $reservation, User $user, AreaType $areaType, FoodType $foodType){
        $this->profile = $profile;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
        $this->areaType = $areaType;
        $this->foodType = $foodType;
    }

    // show dashboard page
    public function index()
    {
        $profileUsers = Profile::where('usertype_id', 2)->latest()->paginate(10);
        $profileOwners = Profile::where('usertype_id', 3)->latest()->paginate(10);
        $restaurants = $this->restaurant->all();
        $reviews = $this->review->all();
        $reservations = $this->reservation->all();

        return view('admin.dashboard',
        [
            'profileUsers'  => $profileUsers,
            'profileOwners' => $profileOwners,
            'restaurants'   => $restaurants,
            'reviews'       => $reviews,
            'reservations'  => $reservations,
        ]);
    }

    public function dashboardAllUsers(){
        $profiles = Profile::where('usertype_id', 2)->withTrashed()->latest()->paginate(3);
        // Data from Users table
        $userIds = [];
        $userNames = [];
        $registDates = [];
        $emails = [];

        // Data from Profiles table
        $firstNames = [];
        $lastNames = [];
        $phones = [];

        foreach ($profiles as $profile) {
            // Data from Users table
            $iData = $this->user->where('id', $profile->user_id)->withTrashed()->get();
            array_push($userIds, $iData);

            $unData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('name')->toArray();
            array_push($userNames, $unData);

            $rgData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('created_at')->toArray();
            array_push($registDates, $rgData);

            $emData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('email')->toArray();
            array_push($emails, $emData);

            // Data from Profiles table
            $firstNames[] = $profile->first_name;
            $lastNames[] = $profile->last_name;
            $phones[] = $profile->phone;

        }

        // dd($userNames);

        array_multisort($userIds, SORT_ASC, $userNames, $firstNames, $lastNames, $registDates, $emails,);

        return view('admin.dashboard_all_users',
        [
            'profiles'=>$profiles,
            'userNames'=>$userNames,
            'userIds'=>$userIds,
            'firstNames'=>$firstNames,
            'lastNames'=>$lastNames,
            'registDates'=>$registDates,
            'emails'=>$emails,
            'phones'=>$phones,
        ]);
    }

    public function deactivate($id){
        $profileUser = Profile::where('user_id', $id);
        $profileUser->delete();

        $user = $this->user->findOrFail($id);
        $user->delete();

        return back();
    }


    public function activate($id){
        $profileUser = Profile::where('user_id','=', $id);
        $profileUser->restore();

        // dd($profileUser);
        $user = User::where('id','=', $id);
        $user->restore();

        return back();
    }


    public function dashboardAllRestaurants(){
        $restaurants = $this->restaurant->withTrashed()->latest()->paginate(3);
        // Data from other tables
        $ownerNames = [];
        $stars = [];
        $areaTypes = [];
        $foodTypes = [];

        // Data from Restaurants table
        $restaurantIds = [];
        $restaurantNames = [];
        $registrationDates = [];


        foreach ($restaurants as $restaurant) {
            // Data from other table
            $owData = $this->user->where('id', $restaurant->user_id)->withTrashed()->get();
            array_push($ownerNames, $owData);

            $sdata = $this->review->where('restaurant_id', $restaurant->id)->get()->pluck('star')->toArray();
            $sdatalength = count($sdata);
            $sdatasum = array_sum($sdata);
            $sdatasum /= $sdatalength;
            array_push($stars, $sdatasum);

            $arData = $this->areaType->where('id', $restaurant->areatype_id)->get()->pluck('station_name')->toArray();
            array_push($areaTypes, $arData);

            $foData = $this->foodType->where('id', $restaurant->foodtype_id)->get()->pluck('name')->toArray();
            array_push($foodTypes, $foData);

            // Data from Restaurants table
            $restaurantIds[] = $restaurant->id;
            $restaurantNames[] = $restaurant->name;
            $registrationDates[] = $restaurant->created_at;
        }

        return view('admin.all_restaurants',
        [
            'restaurants'=>$restaurants,
            'ownerNames'=>$ownerNames,
            'stars'=>$stars,
            'areaTypes'=>$areaTypes,
            'foodTypes'=>$foodTypes,
            'restaurantIds'=>$restaurantIds,
            'restaurantNames'=>$restaurantNames,
            'registrationDates'=>$registrationDates,
        ]);
    }

    public function deactivateRestaurants($id){
        $restaurant = $this->restaurant->findOrFail($id);
        $restaurant->delete();

        return back();
    }


    public function activateRestaurants($id){
        $restaurant = Restaurant::where('id','=',$id);
        $restaurant->restore();

        return back();
    }
}
