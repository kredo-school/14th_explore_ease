<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RestaurantPhoto;

class RestaurantPhotoSeeder extends Seeder
{
    private $restaurant_photo;

    public function __construct(RestaurantPhoto $restaurant_photo)
    {
        $this->restaurant_photo = $restaurant_photo;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurant_photos = [
            [
                'restaurant_id' => 1,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => null,
            ],

            [
                'restaurant_id' => 2,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => null,
            ],

            [
                'restaurant_id' => 3,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => null,
            ],

            [
                'restaurant_id' => 4,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => null,
            ],

            [
                'restaurant_id' => 5,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 5,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => null,
            ],
            [
                'restaurant_id' => 5,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => null,
            ],

        ];
        $this->restaurant_photo->insert($restaurant_photos);
    }
}
