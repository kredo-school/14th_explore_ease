<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Profile;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Nationality;
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
    private $nationality;

    public function __construct(Profile $profile, User $user, Restaurant $restaurant, Review $review, Reservation $reservation, Nationality $nationality){
        $this->profile = $profile;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
        $this->nationality = $nationality;
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

    public function restaurantChartApi(){
        $restaurants = [];
        $labels = [];
        $data = [];
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

    public function reviewChart(){
        $reviews = Review::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->oderBy('month')
                    ->get();

        $labels = [];
        $data = [];

        for($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count =0;

            foreach($reviews as $review){
                if($reviews->month == $i){
                    $count =$reviews->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Reviews',
                'data' => $data,
            ]
            ];
            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function reviewChartApi(){
        $reviews = [];
        $labels = [];
        $data = [];
        $reviews = $this->review->all();

        for($i=1; $i < 13; $i++) {
            $month = date('M',mktime(0,0,0,$i,1));

            array_push($labels,$month);

        }

        for($i=1; $i < 13; $i++){
            $reviewCount = 0;

            for($j = 0; $j < count($reviews); $j++){
                $reviewMonthCreated = (int)explode('-', $reviews[$j]->created_at)[1];
                if($reviewMonthCreated == $i){
                    $reviewCount++;
                }
            }
            array_push($data,$reviewCount);
        }

        $datasets = [
            [
                'label' => 'Review',
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }

    public function reservationChart(){
        $reservations = Reservation::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->oderBy('month')
                    ->get();

        $labels = [];
        $data = [];

        for($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count =0;

            foreach($reservations as $reservation){
                if($reservations->month == $i){
                    $count =$reservations->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Reviews',
                'data' => $data,
            ]
            ];
            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function reservationChartApi(){
        $reservations = [];
        $labels = [];
        $data = [];

        // switch ($id){
        //     case 'restaurant':
        //         $restaurants = DB::table('restaurant')->where('id')->get();
        //         break;
        // }
        $reservations = $this->reservation->all();
        //$reviews = DB::table('profiles')->where('usertype_id', '=', 2)->get();

        for($i=1; $i < 13; $i++) {
            $month = date('M',mktime(0,0,0,$i,1));

            array_push($labels,$month);

        }

        for($i=1; $i < 13; $i++){
            $reservationCount = 0;

            for($j = 0; $j < count($reservations); $j++){
                $reservationMonthCreated = (int)explode('-', $reservations[$j]->created_at)[1];
                if($reservationMonthCreated == $i){
                    $reservationCount++;
                }
            }
            array_push($data,$reservationCount);
        }

        $datasets = [
            [
                'label' => 'Reservation',
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }

    public function nationalityChart(){
        $nationality = Profile::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->oderBy('month')
                    ->get();

        $labels = [];
        $data = [];

        for($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count =0;

            foreach($nationality as $invdivisual_nationality){
                if($invdivisual_nationality->month == $i){
                    $count =$invdivisual_nationality->count;
                    break;
                }
            }

            array_push($data,$count);
            array_push($labels,$month);
        }

        $datasets = [
            [
                'label' => 'Nationality',
                'data' => $data,
            ]
            ];
            return view('admin.dashboard',compact('datasets','labels'));
    }

    public function nationalityChartApi(Request $request){
        $nationality_id = $request->nationality_id;
        $nationality = [];
        $labels = [];
        $data = [];

        switch ($nationality_id){
            case 'countrycode_1':
                $users = DB::table('profiles')->where('nationality_id', '=', 1)->get();
                break;
        }

        for($i=1; $i < 13; $i++) {
            $month = date('M',mktime(0,0,0,$i,1));

            array_push($labels,$month);

        }

        for($i=1; $i < 13; $i++){
            $nationalityCount = 0;

            for($j = 0; $j < count($nationality); $j++){
                $nationalityMonthCreated = (int)explode('-', $nationality[$j]->created_at)[1];
                if($nationalityMonthCreated == $i){
                    $nationalityCount++;
                }
            }
            array_push($data,$nationalityCount);
        }

        $datasets = [
            [
                'label' => 'Nationality',
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }
}
