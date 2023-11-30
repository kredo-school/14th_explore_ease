<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Nationarity;
use App\Models\RestaurantPhoto;

class ProfileController extends Controller
{   
    private $profile;
    private $user;
    private $nationarity;
    private $bookmark;
    private $restaurant_photo;


    public function __construct(Profile $profile, User $user, Nationarity $nationarity, Bookmark $bookmark, RestaurantPhoto $restaurant_photo)
    {
        $this->profile = $profile;
        $this->user = $user;
        $this->nationarity = $nationarity;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {   
        $user = $this->user->findOrFail($id);
        return view('users.profile')->with('user', $user);
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
    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:1|max:50',
            'lastname' => 'required|min:1|max:50',
            'username'=> 'required|min:1|max:50',
            'phonenumber' => 'required|min:1|max:20',
            'email' => 'required|email|unique:users',
            'image' => 'image|mimes:jpg,jpeg,gif,png',
        ]);
        
        $user = $this->user->findOrFail(Auth::user()->id);
        $user->profile->first_name = $request->firstname;
        $user->profile->last_name = $request->lastname;
        $user->profile->phone = $request->phonenumber;
        $user->name = $request->username;
        $user->email = $request->email;
        if($request->image){
            $user->profile->avatar = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        }

        $user->profile->save();
        $user->save();
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
