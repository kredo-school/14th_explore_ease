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
    public function store(Request $request)
    {
        # 1. Validate all form data
        // $request->validate([
        //     'number_of_people' . $restaurant_id . '.required' => 'You cannot submit an empty comment.',
        //     'reservation_start_date' . $restaurant_id . '.required' => 'You cannot submit an empty comment.',
        //     'reservation_start_time' . $restaurant_id . '.required' => 'You cannot submit an empty comment.',
        //     'seat_id' . $restaurant_id  => '.required',
        //     'course_id' . $restaurant_id  => '.required',
        //     'requests' . $restaurant_id  => '.required',
            

        // ]);

        # 2. Save the post ???? 
        $this->reservation->user_id        = Auth::user()->id;
        $this->reservation->restaurant_id            = Auth::user()->id;

        $this->reservation->reservation_start_date   = $request->reservation_start_date;
        $this->reservation->reservation_start_time   = $request->reservation_start_time;
        $this->reservation->reservation_end_date   =  $request->reservation_start_date;
        $this->reservation->reservation_end_time   = $request->reservation_end_time;
        $this->reservation->reservation_minutes   = $request->reservation_minutes;
        
        $this->reservation->seat_id   = $request->seat_id;
        $this->reservation->course_id   = $request->course_id;
        $this->reservation->number_of_people         = $request->number_of_people;
        $this->reservation->requests         = $request->requests;

        $this->reservation->timestamps         = $request->timestamps;



        $this->reservation->save();

        #3. go back to the homepage
        return redirect()->route('index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
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

    public function rules()
    {
        return [
            'reservation_ppl' => ['required'],
            'reservation_start_date' => ['required'],
            'reservation_start_time' => ['required'],
        ];
    }
}
