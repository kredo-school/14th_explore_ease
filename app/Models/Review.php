<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restaurant_id', 'star', 'comment'];

    /** 
     * Review-User
     * a Review belongs to a User
     * to get the owner of the Review
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** 
     * Review-Restaurant
     * a Review belongs to a Restaurant
     * to get the owner of the Review
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
