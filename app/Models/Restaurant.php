<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;

    /** 
     * Restaurant-User
     * a Restaurant belongs to a User
     * to get the owner of the Restaurant
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** 
     * Restaurant-AreaType
     * a Restaurant belongs to a AreaType
     * to get the owner of the Restaurant
     */
    public function areatype()
    {
        return $this->belongsTo(AreaType::class);
    }

    /** 
     * Restaurant-FoodType
     * a Restaurant belongs to a FoodType
     * to get the owner of the Restaurant
     */
    public function foodtype()
    {
        return $this->belongsTo(FoodType::class);
    }

    /** to get all the reviews of a restaurant */
    public function reviews()
    {
        return $this->hasMany(Review::class)->orderBy('restaurant_id')->get();
    }

    /** to get all the bookmarks of a restaurant */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class)->orderBy('restaurant_id')->get();
    }

    /** to get all the seats of a restaurant */
    public function seats()
    {
        return $this->hasMany(Seat::class)->orderBy('id')->get();
    }

    /** to get all the courses of a restaurant */
    public function courses()
    {
        return $this->hasMany(Course::class)->orderBy('id')->get();
    }

    /** to get all the restaurant_photos of a restaurant */
    public function restaurant_photos()
    {
        return $this->hasMany(RestaurantPhoto::class)->orderBy('id')->get();
    }

    /** to get all the openhours of a restaurant */
    public function openhours()
    {
        return $this->hasMany(OpenHour::class)->orderBy('restaurant_id')->get();
    }

    /** to get all the features of a restaurant */
    public function features()
    {
        return $this->hasMany(Feature::class)->orderBy('restaurant_id')->get();
    }

    /** to get all the budgets of a restaurant */
    public function budgets()
    {
        return $this->hasMany(Budget::class)->orderBy('restaurant_id')->get();
    }

    /** to get all the reservations of a restaurant */
    public function reservations()
    {
        return $this->hasMany(Reservation::class)->orderBy('id')->get();
    }
}
