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
    public function store($restaurant_id)
    {
        $this->bookmark->user_id = Auth::user()->id;
        $this->bookmark->restaurant_id = $restaurant_id;
        $this->bookmark->save();

        return redirect()->back();
    }

    /**
     * Delete(Remove) bookmark.
     */

    public function destroy($id){
        $this->bookmark->where('user_id', Auth::user()->id)
                        ->where('restaurant_id', $id)
                        ->delete();

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(){
        //
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
