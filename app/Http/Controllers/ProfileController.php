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
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{   
    private $profile;
    private $user;
    private $nationality;
    private $bookmark;
    private $restaurant_photo;

    private $restaurant;

    public function __construct(Profile $profile, User $user, Nationality $nationality, Bookmark $bookmark, RestaurantPhoto $restaurant_photo)
    {
        $this->profile = $profile;
        $this->user = $user;
        $this->nationality = $nationality;
        $this->bookmark = $bookmark;
        $this->restaurant_photo = $restaurant_photo;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $nationalities = $this->nationality->get();
        return view('users.profile')->with('user', $user)->with('nationalities',$nationalities);
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
