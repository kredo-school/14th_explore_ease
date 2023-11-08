<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use DateTime;

class RestaurantSeeder extends Seeder
{
    private $restaurant;

    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'user_id' => 11,
                'name' => 'Restaurant011',
                'description' => 'Traditional Japanese Restaurant.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => '147',
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 12,
                'name' => 'Restaurant012',
                'description' => 'Traditional Japanese Restaurant.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => '147',
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 13,
                'name' => 'Restaurant013',
                'description' => 'Traditional Japanese Restaurant.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => '147',
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 14,
                'name' => 'Restaurant014',
                'description' => 'Traditional Japanese Restaurant.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => '147',
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 15,
                'name' => 'Restaurant015',
                'description' => 'Traditional Japanese Restaurant.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => '147',
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->restaurant->insert($restaurants);
    }
}
