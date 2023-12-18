<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Review;
use App\Models\Reservation;

class AdminController extends Controller
{
    private $profile;
    private $user;
    private $restaurant;
    private $review;
    private $reservation;
    
    
    public function __construct(Profile $profile, User $user, Restaurant $restaurant, Review $review, Reservation $reservation,){
        $this->profile = $profile;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
    }

    // show dashboard page
    public function index()
    {
        $profileUsers = Profile::where('usertype_id', 2)->latest()->paginate(10);
        $profileOwners = Profile::where('usertype_id', 3)->latest()->paginate(10);
        $restaurants = $this->restaurant->all();
        $reviews = $this->review->all();
        $reservations = $this->reservation->all();
        
        return view('admin.dashboard',
        [
            'profileUsers'  => $profileUsers,
            'profileOwners' => $profileOwners,
            'restaurants'   => $restaurants,
            'reviews'       => $reviews,
            'reservations'  => $reservations,
        ]);
    }
    
    public function userChart(){

        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at',date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

        $labels = [];
        $data   = [];
        $colors = ['#CAC2C7'];

        for ($i=1; $i < 12; $i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;

            foreach($users as $user){
                if($user->month == $i)
                $count = $user->count;
                break;
            }
            
                    array_push($labels,$month);
                    array_push($data,$count);
        }

        $datasets = [
            [
            'label' => 'users',
            'data'  => $data,
            'backgroundColors' => $colors
            ]
        ];

        return view('admin.dashboard',compact('datasets', 'labels'));

    }

}
