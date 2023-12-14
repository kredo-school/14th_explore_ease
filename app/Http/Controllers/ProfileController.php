<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Nationality;
use App\Models\Restaurant;
use App\Models\RestaurantPhoto;
use App\Models\Foodtype;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{   
    private $profile;
    private $user;
    private $nationality;
    private $bookmark;
    private $restaurant_photo;
    private $foodtype;
    private $restaurant;

    public function __construct(Profile $profile, User $user, Nationality $nationality, Bookmark $bookmark, RestaurantPhoto $restaurant_photo, Restaurant $restaurant, Foodtype $foodtype)
    {
        $this->profile = $profile;
        $this->user = $user;
        $this->nationality = $nationality;
        $this->bookmark = $bookmark;
        $this->restaurant_photo = $restaurant_photo;
        $this->restaurant = $restaurant;
        $this->foodtype = $foodtype;
    }



    // Display bookmark page from menu bar
    public function bookmarkShow($id)
    {   
        $user = $this->user->findOrFail($id);
        $bookmarks = $this->bookmark->where('user_id', Auth::user()->id)->get();
        //parts of count on header.blade.php
        // 1. count restaurants for the owner
        $count_restaurant = $user->restaurants->count();
        if(Auth::user()->profile->usertype_id != 3){
            $count_restaurant = "ー";
        }
        
        // 2. count reservations, reviews, bookmarks for the user
        $count_reservation = $user->reservations->count();
        $count_review = $user->reviews->count();
        $count_bookmark = $user->bookmarks->count();
        if(Auth::user()->profile->usertype_id != 2){
            $count_reservation = "ー";
            $count_review = "ー";
            $count_bookmark = "ー";
        }

        $restaurant_photos = [];
        $features = [];
        foreach($bookmarks as $bookmark){
            $data = $this->restaurant_photo
            ->where('restaurant_id', $bookmark->restaurant_id)
            ->get()[0];
            array_push($restaurant_photos, $data);

            $data_f = $bookmark->restaurant->features;
            array_push($features, $data_f);
        }

        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.bookmark', 
        ['bookmarks'=>$bookmarks, 'restaurant_photos'=>$restaurant_photos, 'user'=>$user, 'features'=>$features, 
        'count_restaurant'=>$count_restaurant, 'count_reservation'=>$count_reservation, 
        'count_review'=>$count_review, 'count_bookmark'=>$count_bookmark]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }
    // Show profile page
    public function show($id)
    {   
        $user = $this->user->findOrFail($id);
        // We use $nationalities at nationality selction on profile modal.
        $nationalities = $this->nationality->get(); 

        //parts of count on header.blade.php
        // 1. count restaurants for the owner
        $count_restaurant = $user->restaurants->count();
        if(Auth::user()->profile->usertype_id != 3){
            $count_restaurant = "ー";
        }
        
        // 2. count reservations, reviews, bookmarks for the user
        $count_reservation = $user->reservations->count();
        $count_review = $user->reviews->count();
        $count_bookmark = $user->bookmarks->count();
        if(Auth::user()->profile->usertype_id != 2){
            $count_reservation = "ー";
            $count_review = "ー";
            $count_bookmark = "ー";
        }

        //We use $restaurants and $foodtype at restaurant profile for owners.
        $restaurants = $this->restaurant->latest()->get();  
        $foodtype = $this->foodtype->get(); 

        return view('users.profile')->with('user', $user)
        ->with('nationalities',$nationalities)
        ->with('restaurants', $restaurants)
        ->with('count_restaurant', $count_restaurant)
        ->with('count_reservation', $count_reservation)
        ->with('count_review', $count_review)
        ->with('count_bookmark', $count_bookmark);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //  Update profile (with modal)
    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'username'=> 'required|max:50',
            'phonenumber' => 'required|max:20',
            'email' =>['required','email', Rule::unique('users')->ignore(Auth::user()->id)] ,
            'image' => 'image|mimes:jpg,jpeg,gif,png',
            'nationality' => 'required',
        ]);
       
        $user = $this->user->findOrFail(Auth::user()->id);
        $user->profile->first_name = $request->firstname;
        $user->profile->last_name = $request->lastname;
        $user->profile->phone = $request->phonenumber;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->profile->nationality_id = $request->nationality;
        if($request->image){
            $user->profile->avatar = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }
        
        $user->save();
        $user->profile->save();

        return redirect()->route('profile.show', Auth::user()->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }


}
