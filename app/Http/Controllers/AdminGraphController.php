<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Profile;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AdminGraphController extends Controller
{
    private $profile;
    private $user;
    private $restaurant;
    private $review;
    private $reservation;


    public function __construct(Profile $profile, User $user, Restaurant $restaurant, Review $review, Reservation $reservation){
        $this->profile = $profile;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
        $this->user = $user;
        $this->user = $user;
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
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->oderBy('month')
                    ->get();

        $labels = [];
        $data = [];

        for($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count =0;

            foreach($users as $user){
                if($user->month == $i){
                    $count =$user->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Users',
                'data' => $data,

            ]
            ];
            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function userChartApi(Request $request){
        $user_type = $request->user_type;
        $users = [];
        $labels = [];
        $data = [];

        switch ($user_type){
            case 'user':
                $users = DB::table('profiles')->where('usertype_id', '=', 2)->get();
                break;
            case 'owner':
                $users = DB::table('profiles')->where('usertype_id', '=', 3)->get();
                break;
        }

        for($i=1; $i < 13; $i++) {
            $month = date('M',mktime(0,0,0,$i,1));

            array_push($labels,$month);

        }

        for($i=1; $i < 13; $i++){
            $userCount = 0;

            for($j = 0; $j < count($users); $j++){
                $userMonthCreated = (int)explode('-', $users[$j]->created_at)[1];
                if($userMonthCreated == $i){
                    $userCount++;
                }
            }
            array_push($data,$userCount);
        }

        $datasets = [
            [
                'label' => 'Users',//need to chage each of graph
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }

   
    
    public function restaurantChart(){
        $restaurants = Restaurant::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->oderBy('month')
                    ->get();

        $labels = [];
        $data = [];

        for($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count =0;

            foreach($restaurants as $restaurant){
                if($restaurant->month == $i){
                    $count =$restaurant->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Restaurant',
                'data' => $data,
            ]
            ];
            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function restaurantChartApi(Request $request){
        $restaurants = [];
        $labels = [];
        $data = [];

        // switch ($id){
        //     case 'restaurant':
        //         $restaurants = DB::table('restaurant')->where('id')->get();
        //         break;
        // }
        $restaurants = $this->restaurant->all();

        for($i=1; $i < 13; $i++) {
            $month = date('M',mktime(0,0,0,$i,1));

            array_push($labels,$month);

        }

        for($i=1; $i < 13; $i++){
            $restaurantCount = 0;

            for($j = 0; $j < count($restaurants); $j++){
                $restaurantMonthCreated = (int)explode('-', $restaurants[$j]->created_at)[1];
                if($restaurantMonthCreated == $i){
                    $restaurantCount++;
                }
            }
            array_push($data,$restaurantCount);
        }

        $datasets = [
            [
                'label' => 'Restauramt',
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }

    public function restaurantChart(){
        $restaurants = Restaurant::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->oderBy('month')
                    ->get();

        $labels = [];
        $data = [];

        for($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count =0;

            foreach($restaurants as $restaurant){
                if($restaurant->month == $i){
                    $count =$restaurant->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Restaurant',
                'data' => $data,
            ]
            ];
            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function restaurantChartApi(Request $request){
        $restaurants = [];
        $labels = [];
        $data = [];

        // switch ($id){
        //     case 'restaurant':
        //         $restaurants = DB::table('restaurant')->where('id')->get();
        //         break;
        // }
        $restaurants = $this->restaurant->all();

        for($i=1; $i < 13; $i++) {
            $month = date('M',mktime(0,0,0,$i,1));

            array_push($labels,$month);

        }

        for($i=1; $i < 13; $i++){
            $restaurantCount = 0;

            for($j = 0; $j < count($restaurants); $j++){
                $restaurantMonthCreated = (int)explode('-', $restaurants[$j]->created_at)[1];
                if($restaurantMonthCreated == $i){
                    $restaurantCount++;
                }
            }
            array_push($data,$restaurantCount);
        }

        $datasets = [
            [
                'label' => 'Restauramt',
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }
}
