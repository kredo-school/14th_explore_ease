<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\RestaurantPhoto;
use App\Models\Seat;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $reservation;
    private $restaurant;
    private $restaurantphoto;
    private $booking_data;
    private $message;
    private $course;
    private $all_courses;

    public function __construct(Restaurant $restaurant, Restaurant $message, Reservation $reservation, RestaurantPhoto $restaurantphoto, Course $course)
    {
        $this->restaurant = $restaurant;
        $this->message = $message;
        $this->reservation = $reservation;
        $this->restaurantphoto = $restaurantphoto;
        $this->course = $course;
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = $this->restaurant->findOrFail($id);
        $restaurantphoto =  $this->restaurantphoto->findOrFail($restaurant->id);
        $course =  $this->course->findOrFail($id);
        $all_courses = $restaurant->courses->all();

        //$all_courses = $restaurant->courses();
        //dd($all_courses);

        return view('restaurant.reservation.show',
         ['restaurant'=> $restaurant, 'restaurantphoto' => $restaurantphoto,
          'course' => $course, 'all_courses' => $all_courses, ]);
    }

    public function show_message($id)
    {
        $restaurant = $this->restaurant->findOrFail($id);
        $massage = $this->restaurant->findOrFail($restaurant->message);
        return view('restaurant.reservation.show')->with('$message');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $all_courses = $this->course->findOrFail($id);
        return view('restaurant.reservation.show')->with('all_course', $all_courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $restaurant_id)
    {
        # 2. Save the post ???? 
        $this->reservation->user_id        = Auth::user()->id;
        $this->reservation->restaurant_id            = $restaurant_id;
        $this->reservation->reservation_start_date   = $request->reservation_start_date;
        $this->reservation->reservation_start_time   = $request->reservation_start_time;
        $this->reservation->reservation_end_date     =  $request->reservation_start_date;
        $this->reservation->seat_id                  = $request->seat_id;
        $this->reservation->course_id                = $request->course;
        $this->reservation->number_of_people         = $request->number_of_people;
        $this->reservation->requests                 = $request->requests;
        $course = $this->course->find($request->course); 
        if($course)
        {
            $this->reservation->reservation_end_time = date('H:i:s', strtotime($request->reservation_start_time . ' +' . $course->reservation_minutes . ' minutes'));
            $this->reservation->reservation_minutes = $course->reservation_minutes;
        }else{
            $this->reservation->reservation_end_time = date('H:i:s', strtotime($request->reservation_start_time . ' +60 minutes'));
            $this->reservation->reservation_minutes = 60;
        }


        $this->reservation->save();

        #3. go back to the homepage
        return redirect()->route('restaurant.show');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($reservation_id)
    {   
        $reservation = $this->reservation->findOrFail($reservation_id);
        $restaurants = $reservation->restaurant;
        $restaurantphotos = $this->restaurantphoto;
        $courses =  $restaurants->courses;
        $all_courses = $courses;

        return view('users.profile_show_reservation',
         ['reservation'=>$reservation, 'restaurant'=> $restaurants, 'restaurantphoto' => $restaurantphotos,
          'course' => $courses, 'all_courses' => $all_courses, ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function admin_show(Reservation $reservation)
    {
        return view('admin.dashboard_all_reservations');
    }



}
