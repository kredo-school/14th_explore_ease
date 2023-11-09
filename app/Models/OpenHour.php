<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    use HasFactory;

    protected $table = 'openhours';
    protected $fillable = ['restaurant_id', 'daytype', 'openinghours', 'closinghours', 'closed'];
    public $timestamps = false;

    /** 
     * OpenHour-Restaurant
     * a OpenHour belongs to a Restaurant
     * to get the owner of the OpenHour
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
