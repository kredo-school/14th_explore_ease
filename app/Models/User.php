<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /** to get one profile of a user */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /** to get all the restaurants of a user */
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
        // return $this->hasMany(Restaurant::class)->latest();
    }

    /** to get all the reviews of a user */
    public function reviews()
    {
        return $this->hasMany(Review::class);
        // return $this->hasMany(Review::class)->latest();
    }

    /** to get all the bookmarks of a user */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
        // return $this->hasMany(Bookmark::class)->latest();
    }

    /** to get all the reservations of a user */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
        // return $this->hasMany(Reservation::class)->latest();
    }
}
