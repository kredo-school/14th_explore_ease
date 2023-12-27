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
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 1,

                'created_at' => '2023-01-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 12,
                'name' => 'Restaurant012',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 2,

                'created_at' => '2023-02-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 13,
                'name' => 'Restaurant013',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 3,

                'created_at' => '2023-03-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 14,
                'name' => 'Restaurant014',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 4,

                'created_at' => '2023-04-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 15,
                'name' => 'Restaurant015',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 5,

                'created_at' => '2023-05-01',
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 11,
                'name' => 'Restaurant016',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 1,

                'created_at' => '2023-06-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 12,
                'name' => 'Restaurant017',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 2,

                'created_at' => '2023-07-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 13,
                'name' => 'Restaurant018',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 3,

                'created_at' => '2023-08-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 14,
                'name' => 'Restaurant019',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 4,

                'created_at' => '2023-09-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 15,
                'name' => 'Restaurant020',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 5,

                'created_at' => '2023-10-01',
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 11,
                'name' => 'Restaurant021',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 1,

                'created_at' => '2023-11-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 12,
                'name' => 'Restaurant022',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 2,

                'created_at' => '2023-12-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 13,
                'name' => 'Restaurant023',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 3,

                'created_at' => '2023-12-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 14,
                'name' => 'Restaurant024',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 4,

                'created_at' => '2023-11-01',
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 15,
                'name' => 'Restaurant025',
                'description' => 'Traditional Japanese Restaurant.',
                'message' => 'Please contact the store directory when booking more than 9 people.',
                'menu' => 'Sushi: $2000',

                'areatype_id' => 147,
                'address' => '東京都新宿区',
                'latitude' => 35.690725,
                'longitude' => 139.699851,
                'foodtype_id' => 5,
                'avgstar' => 5,

                'created_at' => '2023-10-01',
                'updated_at' => new DateTime(),
            ],
        ];
        $this->restaurant->insert($restaurants);
    }
}
