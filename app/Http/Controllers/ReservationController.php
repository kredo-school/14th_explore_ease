<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\RestaurantPhoto;
use App\Models\Seat;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $reservation;
    private $restaurant;
    private $restaurantphoto;

    public function __construct(Restaurant $restaurant, Reservation $reservation, RestaurantPhoto $restaurantphoto)
    {
        $this->restaurant = $restaurant;
        $this->reservation = $reservation;
        $this->restaurantphoto = $restaurantphoto;
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = $this->restaurant->findOrFail($id);
        $restaurantphoto =  $this->restaurantphoto->findOrFail($restaurant->id);
        /*dd($restaurantphoto->photo);*/
        return view('restaurant.reservation.show', ['restaurant'=>$restaurant, 'restaurantphoto'=> $restaurantphoto]);
    }
    
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'reservation_ppl' => 'required',
            'reservation_data' => 'required',
            'reservation_time' => 'required'
        ]);
        dd($request);

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
}
