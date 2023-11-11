<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /** 
     * Reservation-User
     * a Reservation belongs to a User
     * to get the owner of the Reservation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** 
     * Reservation-Restaurant
     * a Reservation belongs to a Restaurant
     * to get the owner of the Reservation
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /** 
     * Reservation-Seat
     * a Reservation belongs to a Seat
     * to get the owner of the Reservation
     */
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    /** 
     * Reservation-Course
     * a Reservation belongs to a Course
     * to get the owner of the Reservation
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
