<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'timezonetype'];
    public $timestamps = false;

    /** 
     * Budget-Restaurant
     * a Budget belongs to a Restaurant
     * to get the owner of the Budget
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
