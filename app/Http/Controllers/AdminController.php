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
use App\Models\Course;

class AdminController extends Controller
{
    private $profile;
    private $user;
    private $restaurant;
    private $review;
    private $reservation;
    private $areaType;
    private $foodType;
    private $course;


    public function __construct(Profile $profile, Restaurant $restaurant, Review $review, Reservation $reservation, User $user, AreaType $areaType, FoodType $foodType, Course $course){
        $this->profile = $profile;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
        $this->areaType = $areaType;
        $this->foodType = $foodType;
        $this->course = $course;
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
            $unData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('name')->toArray();
            array_push($userNames, $unData);

            $rgData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('created_at')->toArray();
            $rgData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('created_at')->toArray();
            array_push($registDates, $rgData);

            $emData = $this->user->where('id', $profile->user_id)->withTrashed()->get()->pluck('email')->toArray();
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

    public function dashboardAllOwners(){
        $profiles = Profile::where('usertype_id', 3)->withTrashed()->latest()->paginate(3);
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

        return view('admin.dashboard_all_owners',
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

    public function deactivateOwner($id){
        $profileUser = Profile::where('user_id', $id);
        $profileUser->delete();

        $user = $this->user->findOrFail($id);
        $user->delete();

        return back();
    }


    public function activateOwner($id){
        $profileUser = Profile::where('user_id','=', $id);
        $profileUser->restore();

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

    public function dashboardAllReservations(){
        $reservations = Reservation::orderBy('id', 'desc')->paginate(10);
        // Data from other tables
        $userNames = [];
        $restaurantNames = [];
        $courseNames = [];
        $coursePrices = [];

        // Data from Reservation table
        $reserveIds = [];
        $startDates = [];
        $startTimes = [];
        $reserveMinutes = [];
        $seatOnlys = [];
        $numbers = [];



        foreach ($reservations as $reservation) {
            // Data from other table
            $usData = $this->user->where('id', $reservation->user_id)->get()->pluck('name')->toArray();
            array_push($userNames , $usData);

            $reData = $this->restaurant->where('id', $reservation->restaurant_id)->pluck('name')->toArray();
            array_push($restaurantNames, $reData);

            $cnData = $this->course->where('id', $reservation->course_id)->get()->pluck('name')->toArray();
            array_push($courseNames , $cnData);

            $cpData = $this->course->where('id', $reservation->course_id)->get()->pluck('price')->toArray();
            array_push($coursePrices , $cpData);

            // Data from Restaurants table
            $reserveIds[] = $reservation->id;
            $startDates[] = $reservation->reservation_start_date;
            $startTimes[] = $reservation->reservation_start_time;
            $reserveMinutes[] = $reservation->reservation_minutes;
            $seatOnlys[] = $reservation->seat_id;
            $numbers[] = $reservation->number_of_people;
        }

        return view('admin.dashboard_all_reservations',
        [
            'reservations'=>$reservations,
            'reserveIds'=>$reserveIds,
            'userNames'=>$userNames,
            'restaurantNames'=>$restaurantNames,
            'courseNames'=>$courseNames,
            'coursePrices'=>$coursePrices,
            'startDates'=>$startDates,
            'startTimes'=>$startTimes,
            'reserveMinutes'=>$reserveMinutes,
            'seatOnlys'=>$seatOnlys,
            'numbers'=>$numbers,
        ]);
    }


    public function cancelReservation($id){
        $reservation = $this->reservation->findOrFail($id);
        $reservation->delete();

        return back();
    }

}
