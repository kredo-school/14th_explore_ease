<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\Reservation;

class AdminController extends Controller
{
    private $profile;

    public function __construct(Profile $profile, Restaurant $restaurant, Review $review, Reservation $reservation,){
        $this->profile = $profile;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
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


        /** Show restaurant review page */
    public function ShowRestaurantReview($id){

        // [ Graph of reviews ]
        $reviewOfStar5s = Review::where('restaurant_id', $restaurant->id)->where('star', 5)->get();
        $star5s = [];
            foreach($reviewOfStar5s as $star5){
                $star5s[] = $star5->star;
            }
            $countStar5 = count($star5s);

    $reviewOfStar4s = Review::where('restaurant_id', $restaurant->id)->where('star', 4)->get();
        $star4s = [];
            foreach($reviewOfStar4s as $star4){
                $star4s[] = $star4->star;
            }
            $countStar4 = count($star4s);

    $reviewOfStar3s = Review::where('restaurant_id', $restaurant->id)->where('star', 3)->get();
        $star3s = [];
            foreach($reviewOfStar3s as $star3){
                $star3s[] = $star3->star;
            }
            $countStar3 = count($star3s);

    $reviewOfStar2s = Review::where('restaurant_id', $restaurant->id)->where('star', 2)->get();
        $star2s = [];
            foreach($reviewOfStar2s as $star2){
                $star2s[] = $star2->star;
            }
            $countStar2 = count($star2s);

    $reviewOfStar1s = Review::where('restaurant_id', $restaurant->id)->where('star', 1)->get();
        $star1s = [];
            foreach($reviewOfStar1s as $star1){
                $star1s[] = $star1->star;
            }
            $countStar1 = count($star1s);


    // [ Summary of reviews ]
    $allReviews = Review::where('restaurant_id', $restaurant->id)->get();
        $allStars = [];
            foreach($allReviews as $allStar){
                $allStars[] = $allStar->star;
            }
    $countAllStars = count($allStars);
    $averageAllStars = array_sum($allStars) / $countAllStars;


    return view('restaurant.review',[
        'restaurant' => $restaurant,
        'user' => $user,
        'profile' => $profile,
        'countStar5' => $countStar5,
        'countStar4' => $countStar4,
        'countStar3' => $countStar3,
        'countStar2' => $countStar2,
        'countStar1' => $countStar1,
        'countAllStars' => $countAllStars,
        'averageAllStars' => $averageAllStars,
    ]);
    }
}
