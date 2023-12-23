<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restaurant_id'];

    /** 
     * Bookmark-User
     * a Bookmark belongs to a User
     * to get the owner of the Bookmark
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** 
     * Bookmark-Restaurant
     * a Bookmark belongs to a Restaurant
     * to get the owner of the Bookmark
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
