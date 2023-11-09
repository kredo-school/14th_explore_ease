<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'featuretype_id'];
    public $timestamps = false;

    /** 
     * Feature-Restaurant
     * a Feature belongs to a Restaurant
     * to get the owner of the Feature
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /** 
     * Feature-FeatureType
     * a Feature belongs to a FeatureType
     * to get the owner of the Feature
     */
    public function featuretype()
    {
        return $this->belongsTo(FeatureType::class);
    }
}
