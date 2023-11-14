<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use DateTime;

class ReservationSeeder extends Seeder
{
    private $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'user_id' => 6,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-15',
                'reservation_start_time' => '12:00',
                'reservation_end_date' => '2023-11-15',
                'reservation_end_time' => '13:00',
                'reservation_minutes' => 60,

                'seat_id' => 1,
                'course_id' => null,
                'number_of_people' => 2,
                'requests' => 'We want to use lunch coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 2,
                'reservation_start_date' => '2023-11-15',
                'reservation_start_time' => '16:00',
                'reservation_end_date' => '2023-11-15',
                'reservation_end_time' => '17:30',
                'reservation_minutes' => 90,

                'seat_id' => null,
                'course_id' => 5,
                'number_of_people' => 3,
                'requests' => 'We want to use student coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-15',
                'reservation_start_time' => '18:00',
                'reservation_end_date' => '2023-11-15',
                'reservation_end_time' => '20:00',
                'reservation_minutes' => 120,

                'seat_id' => null,
                'course_id' => 3,
                'number_of_people' => 4,
                'requests' => 'We want to order free drink.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 7,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-16',
                'reservation_start_time' => '12:00',
                'reservation_end_date' => '2023-11-16',
                'reservation_end_time' => '13:00',
                'reservation_minutes' => 60,

                'seat_id' => 1,
                'course_id' => null,
                'number_of_people' => 2,
                'requests' => 'We want to use lunch coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 2,
                'reservation_start_date' => '2023-11-16',
                'reservation_start_time' => '16:00',
                'reservation_end_date' => '2023-11-16',
                'reservation_end_time' => '17:30',
                'reservation_minutes' => 90,

                'seat_id' => null,
                'course_id' => 5,
                'number_of_people' => 3,
                'requests' => 'We want to use student coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-16',
                'reservation_start_time' => '18:00',
                'reservation_end_date' => '2023-11-16',
                'reservation_end_time' => '20:00',
                'reservation_minutes' => 120,

                'seat_id' => null,
                'course_id' => 3,
                'number_of_people' => 4,
                'requests' => 'We want to order free drink.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 8,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-17',
                'reservation_start_time' => '12:00',
                'reservation_end_date' => '2023-11-17',
                'reservation_end_time' => '13:00',
                'reservation_minutes' => 60,

                'seat_id' => 1,
                'course_id' => null,
                'number_of_people' => 2,
                'requests' => 'We want to use lunch coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 2,
                'reservation_start_date' => '2023-11-17',
                'reservation_start_time' => '16:00',
                'reservation_end_date' => '2023-11-17',
                'reservation_end_time' => '17:30',
                'reservation_minutes' => 90,

                'seat_id' => null,
                'course_id' => 5,
                'number_of_people' => 3,
                'requests' => 'We want to use student coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-17',
                'reservation_start_time' => '18:00',
                'reservation_end_date' => '2023-11-17',
                'reservation_end_time' => '20:00',
                'reservation_minutes' => 120,

                'seat_id' => null,
                'course_id' => 3,
                'number_of_people' => 4,
                'requests' => 'We want to order free drink.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 9,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-18',
                'reservation_start_time' => '12:00',
                'reservation_end_date' => '2023-11-18',
                'reservation_end_time' => '13:00',
                'reservation_minutes' => 60,

                'seat_id' => 1,
                'course_id' => null,
                'number_of_people' => 2,
                'requests' => 'We want to use lunch coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 2,
                'reservation_start_date' => '2023-11-18',
                'reservation_start_time' => '16:00',
                'reservation_end_date' => '2023-11-18',
                'reservation_end_time' => '17:30',
                'reservation_minutes' => 90,

                'seat_id' => null,
                'course_id' => 5,
                'number_of_people' => 3,
                'requests' => 'We want to use student coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-18',
                'reservation_start_time' => '18:00',
                'reservation_end_date' => '2023-11-18',
                'reservation_end_time' => '20:00',
                'reservation_minutes' => 120,

                'seat_id' => null,
                'course_id' => 3,
                'number_of_people' => 4,
                'requests' => 'We want to order free drink.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 10,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-19',
                'reservation_start_time' => '12:00',
                'reservation_end_date' => '2023-11-19',
                'reservation_end_time' => '13:00',
                'reservation_minutes' => 60,

                'seat_id' => 1,
                'course_id' => null,
                'number_of_people' => 2,
                'requests' => 'We want to use lunch coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 2,
                'reservation_start_date' => '2023-11-19',
                'reservation_start_time' => '16:00',
                'reservation_end_date' => '2023-11-19',
                'reservation_end_time' => '17:30',
                'reservation_minutes' => 90,

                'seat_id' => null,
                'course_id' => 5,
                'number_of_people' => 3,
                'requests' => 'We want to use student coupon.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 1,
                'reservation_start_date' => '2023-11-19',
                'reservation_start_time' => '18:00',
                'reservation_end_date' => '2023-11-19',
                'reservation_end_time' => '20:00',
                'reservation_minutes' => 120,

                'seat_id' => null,
                'course_id' => 3,
                'number_of_people' => 4,
                'requests' => 'We want to order free drink.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->reservation->insert($reservations);
    }
}
