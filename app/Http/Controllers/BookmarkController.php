<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\RestaurantPhoto;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    private $bookmark;
    private $restaurant_photo;
    private $user;
    private $restaurant;

    public function __construct(Bookmark $bookmark, RestaurantPhoto $restaurant_photo, User $user, Restaurant $restaurant){
        $this->bookmark = $bookmark;
        $this->restaurant_photo = $restaurant_photo;
        $this->user = $user;
        $this->restaurant = $restaurant;
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
     * Create(Store) bookmark.
     */
    public function store($id){
        $this->bookmark->user_id = Auth::user()->id;
        $this->bookmark->restaurant_id = $id;
        $this->bookmark->save();

        return back();
    }

    /**
     * Delete(Remove) bookmark.
     */
    public function destroy($id){
        $this->bookmark->where('user_id', Auth::user()->id)
                        ->where('restaurant_id', $id)
                        ->delete();

        return back();
    }


        /**
     * Display the specified resource.
     */
    public function show(){
        $bookmarks = $this->bookmark->where('user_id', Auth::user()->id)->get();


        $restaurant_photos = [];
        foreach($bookmarks as $bookmark){
            $data = $this->restaurant_photo
            ->where('restaurant_id', $bookmark->restaurant_id)
            ->get()[0];

                array_push($restaurant_photos, $data);
        }

        $user = $this->user->where('id', Auth::user()->id)->get();

        return view('users.bookmark', ['bookmarks'=>$bookmarks, 'restaurant_photos'=>$restaurant_photos, 'user'=>$user]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }



}
