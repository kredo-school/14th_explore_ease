<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'reservation_minutes'];

    public $timestamps = false;

    /** 
     * Seat-Restaurant
     * a Seat belongs to a Restaurant
     * to get the owner of the Seat
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
