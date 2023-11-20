<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $restaurant;
    private $review;

    public function __construct(Restaurant $restaurant, Review $review){
        $this -> restaurant = $restaurant;
        $this -> review = $review;
    }

    public function store(Request $request, $restaurant_id){
        $request->validate([
            'star' => 'required',
            'comment' => 'required|min:1'
        ]);

        $this->review->comment = $request->comment;
        // $this->review->user_id = Auth::user()->id;
        $this->review->star = $request->star;
        $this->review->user_id = 3;
        $this->review->restaurant_id = $restaurant_id;
        $this->review->save();

        return redirect()->route('restaurant.detail', $restaurant_id);
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

    /** Show restaurant review page */
    public function ShowRestaurantReview($id){
        $restaurant = $this->restaurant->findOrFail($id);
        // $review = $this->review->findOrFail($id);

        return view('restaurant.review')->with('restaurant', $restaurant);
    }

}
