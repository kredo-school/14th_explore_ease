<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    // use HasFactory;
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'first_name', 'last_name', 'avatar', 'phone', 'usertype_id', 'nationality_id'];
    protected $primaryKey = 'user_id';
    /**
     * Profile-User
     * a Profile belongs to a User
     * to get the owner of the Profile
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
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
     * Profile-Nationality
     * a Profile belongs to a Nationality
     * to get the owner of the Profile
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
}
