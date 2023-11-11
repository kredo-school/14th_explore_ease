<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'first_name', 'last_name', 'avatar', 'phone', 'usertype_id', 'nationarity_id'];

    /** 
     * Profile-User
     * a Profile belongs to a User
     * to get the owner of the Profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** 
     * Profile-UserType
     * a Profile belongs to a UserType
     * to get the owner of the Profile
     */
    public function usertype()
    {
        return $this->belongsTo(UserType::class);
    }

    /** 
     * Profile-Nationarity
     * a Profile belongs to a Nationarity
     * to get the owner of the Profile
     */
    public function nationarity()
    {
        return $this->belongsTo(Nationarity::class);
    }
}
