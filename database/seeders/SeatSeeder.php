<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    private $seat;

    public function __construct(Seat $seat)
    {
        $this->seat = $seat;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = [
            [
                'restaurant_id' => 1,
                'name' => '1 hour seat',
                'description' => 'For 1 hour seat only reservation.',
                'price' => 0,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 2,
                'name' => '1 hour seat',
                'description' => 'For 1 hour seat only reservation.',
                'price' => 0,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 3,
                'name' => '1 hour seat',
                'description' => 'For 1 hour seat only reservation.',
                'price' => 0,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 4,
                'name' => '1 hour seat',
                'description' => 'For 1 hour seat only reservation.',
                'price' => 0,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 5,
                'name' => '1 hour seat',
                'description' => 'For 1 hour seat only reservation.',
                'price' => 0,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
        ];
        $this->seat->insert($seats);
    }
}
