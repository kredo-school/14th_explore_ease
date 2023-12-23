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
use App\Models\AreaType;
use App\Models\FoodType;

class AdminController extends Controller
{
    private $profile;
    private $user;
    private $restaurant;
    private $review;
    private $reservation;
    private $areaType;
    private $foodType;


    public function __construct(Profile $profile, Restaurant $restaurant, Review $review, Reservation $reservation, User $user, AreaType $areaType, FoodType $foodType){
        $this->profile = $profile;
        $this->user = $user;
        $this->restaurant = $restaurant;
        $this->review = $review;
        $this->reservation = $reservation;
        $this->areaType = $areaType;
        $this->foodType = $foodType;
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

    public function dashboardAllUsers(){
        $profiles = Profile::where('usertype_id', 2)->withTrashed()->latest()->paginate(3);
        // Data from Users table
        $userIds = [];
        $userNames = [];
        $registDates = [];
        $emails = [];

        // Data from Profiles table
        $firstNames = [];
        $lastNames = [];
        $phones = [];

        foreach ($profiles as $profile) {
            // Data from Users table
            $iData = $this->user->where('id', $profile->user_id)->get();
            array_push($userIds, $iData);

            $unData = $this->user->where('id', $profile->user_id)->get()->pluck('name')->toArray();
            array_push($userNames, $unData);

            $rgData = $this->user->where('id', $profile->user_id)->get()->pluck('created_at')->toArray();
            array_push($registDates, $rgData);

            $emData = $this->user->where('id', $profile->user_id)->get()->pluck('email')->toArray();
            array_push($emails, $emData);

            // Data from Profiles table
            $firstNames[] = $profile->first_name;
            $lastNames[] = $profile->last_name;
            $phones[] = $profile->phone;

        }

        // dd($userNames);

        array_multisort($userIds, SORT_ASC, $userNames, $firstNames, $lastNames, $registDates, $emails,);

        return view('admin.dashboard_all_users',
        [
            'profiles'=>$profiles,
            'userNames'=>$userNames,
            'userIds'=>$userIds,
            'firstNames'=>$firstNames,
            'lastNames'=>$lastNames,
            'registDates'=>$registDates,
            'emails'=>$emails,
            'phones'=>$phones,
        ]);
    }

    public function hide($id){
        $this->user->destroy($id);

        $user = $this->user->findOrFail($id);
        $user_id = $user->profile->pluck('user_id');
        $this->profile->destroy($user_id);

        return back();
    }


    public function unhide($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();

        $user = $this->user->findOrFail($id);
        $user_id = $user->profile->pluck('user_id');
        $this->profile->onlyTrashed()->findOrFail($user_id)->restore();

        return back();
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
                'label' => 'Users',
                'data' => $data,
                'backgroundColor' => "#CAC2C7"
            ]
        ];
        return Response::json(['success'=>true, 'labels'=>$labels, 'datasets'=>$datasets]);
    }

    public function dashboardAllReviews(){
        $reviews = $this->review->latest()->paginate(10);
        // Data from other tables
        $restaurantNames = [];
        $userNames = [];

        // Data from Reviews table
        $reviewDates = [];
        $rates = [];
        $reviewComments = [];


        foreach ($reviews as $review) {
            // Data from other table
            $reData = $this->restaurant->where('id', $review->restaurant_id)->pluck('name')->toArray();
            array_push($restaurantNames, $reData);

            $usData = $this->user->where('id', $review->user_id)->get()->pluck('name')->toArray();
            array_push($userNames , $usData);

            // Data from Restaurants table
            $reviewDates[] = $review->created_at;
            $rates[] = $review->star;
            $reviewComments[] = $review->comment;
        }

        return view('admin.all_reviews',
        [
            'reviews'=>$reviews,
            'restaurantNames'=>$restaurantNames,
            'userNames'=>$userNames,
            'reviewDates'=>$reviewDates,
            'rates'=>$rates,
            'reviewComments'=>$reviewComments,
        ]);
    }
}
