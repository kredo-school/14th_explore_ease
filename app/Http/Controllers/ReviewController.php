<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    private $restaurant;
    private $review;
    private $user;
    private $profile;

    public function __construct(Restaurant $restaurant, Review $review, User $user, Profile $profile){
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->user = $user;
        $this->profile = $profile;
    }

    /** Show restaurant review page */
    public function ShowRestaurantReview($id){
    $restaurant = $this->restaurant->findOrFail($id);
    if (Auth::check()) {
        $user = $this->user->findOrFail(Auth::user()->id);
        $profile = $user->profile;
    } else {
        $user = new User();
        $profile = new Profile();
    }

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


    public function store(Request $request, $restaurant_id){
        $request->validate([
            'star' => 'required',
            'comment' => 'required|min:1'
        ]);

        // get exist review record.
        $review = $this->review
            ->where([
                ['user_id', Auth::user()->id],
                ['restaurant_id', $restaurant_id]
            ])->get();

        // delete exist review record to put new review.
        if ($review != null) {
            $this->review
                ->where([
                    ['user_id', Auth::user()->id],
                    ['restaurant_id', $restaurant_id]
                ])->delete();
        }

        $this->review->comment = $request->comment;
        $this->review->star = $request->star;
        $this->review->user_id = Auth::user()->id;
        $this->review->restaurant_id = $restaurant_id;
        $this->review->save();

        // calculate average of star and set it to the restaurant.
        $avgstar = $this->calcStarAverage($restaurant_id);
        $restaurant = $this->restaurant->findOrFail($restaurant_id);
        $restaurant->avgstar = $avgstar;
        $restaurant->save();

        return redirect()->route('restaurant.detail', $restaurant_id);
    }

    /**
     * Return average of star value.
     * The value is rouned. (ex) 2.45 -> 2.5
     */
    public function calcStarAverage($restaurant_id)
    {
        $avgstar = $this->review
            ->where('restaurant_id', $restaurant_id)
            ->avg('star');

        return round($avgstar, 1);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }



}
