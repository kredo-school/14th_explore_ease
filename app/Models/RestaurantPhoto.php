<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model
{
    use HasFactory;

    protected $table = 'restaurant_photos';
    public $timestamps = false;

    /** 
     * RestaurantPhoto-Restaurant
     * a RestaurantPhoto belongs to a Restaurant
     * to get the owner of the RestaurantPhoto
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
