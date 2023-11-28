<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Profile;
use App\Models\RestaurantPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    public function show(Profile $profile)
    {
        //
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
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }


}
