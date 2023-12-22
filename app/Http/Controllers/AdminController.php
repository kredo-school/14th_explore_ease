<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\Reservation;
use App\Models\User;
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
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
        $this->user = $user;
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
            'profileUsers'=>$profileUsers,
            'profileOwners'=>$profileOwners,
            'restaurants'=>$restaurants,
            'reviews'=>$reviews,
            'reservations'=>$reservations,
        ]);
    }

    public function dashboardAllUsers(){
        // $profiles = Profile::where('usertype_id', 2)->latest()->paginate(3);
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
            $iData = $this->user->where('id', $profile->user_id)->get();
            array_push($userIds, $iData);

            $unData = $this->user->where('id', $profile->user_id)->get()->pluck('name')->toArray();
            array_push($userNames, $unData);

            $rgData = $this->user->where('id', $profile->user_id)->get()->pluck('created_at')->toArray();
            array_push($registDates, $rgData);

            $emData = $this->user->where('id', $profile->user_id)->get()->pluck('email')->toArray();
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

    public function hide($id){
        $this->user->destroy($id);

        $user = $this->user->findOrFail($id);
        $user_id = $user->profile->pluck('user_id');
        $this->profile->destroy($user_id);

        return back();
    }


    public function unhide($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();

        $user = $this->user->findOrFail($id);
        $user_id = $user->profile->pluck('user_id');
        $this->profile->onlyTrashed()->findOrFail($user_id)->restore();

        return back();
    }

    public function dashboardAllReviews(){
        $reviews = $this->review->latest()->paginate(10);
        // Data from other tables
        $restaurantNames = [];
        $userNames = [];

        // Data from Reviews table
        $reviewDates = [];
        $rates = [];
        $reviewComments = [];


        foreach ($reviews as $review) {
            // Data from other table
            $reData = $this->restaurant->where('id', $review->restaurant_id)->pluck('name')->toArray();
            array_push($restaurantNames, $reData);

            $usData = $this->user->where('id', $review->user_id)->get()->pluck('name')->toArray();
            array_push($userNames , $usData);

            // Data from Restaurants table
            $reviewDates[] = $review->created_at;
            $rates[] = $review->star;
            $reviewComments[] = $review->comment;
        }

        return view('admin.all_reviews',
        [
            'reviews'=>$reviews,
            'restaurantNames'=>$restaurantNames,
            'userNames'=>$userNames,
            'reviewDates'=>$reviewDates,
            'rates'=>$rates,
            'reviewComments'=>$reviewComments,
        ]);
    }
}
