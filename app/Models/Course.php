<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['restaurant_id', 'photo', 'name', 'description', 'reservation_minutes'];
    public $timestamps = false;

    /** 
     * Course-Restaurant
     * a Course belongs to a Restaurant
     * to get the owner of the Course
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
