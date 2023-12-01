<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\RestaurantPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    private $bookmark;
    private $restaurant_photo;

    public function __construct(Bookmark $bookmark, RestaurantPhoto $restaurant_photo){
        $this->bookmark = $bookmark;
        $this->restaurant_photo = $restaurant_photo;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


        return view('users.bookmark', ['bookmarks'=>$bookmarks, 'restaurant_photos'=>$restaurant_photos]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }

}
