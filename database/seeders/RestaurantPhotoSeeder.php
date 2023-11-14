<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // set 20M on mysql's max_allowed_packet temporarily to avoid over packet size
        DB::statement('SET GLOBAL max_allowed_packet=20971520');

        $restaurant_image1 = 'data:image/' . 'jpg' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/restaurant_1.jpg'));
        $restaurant_image2 = 'data:image/' . 'jpg' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/restaurant_2.jpg'));
        $restaurant_image3 = 'data:image/' . 'jpg' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/restaurant_3.jpg'));

        $restaurant_photos = [
            [
                'restaurant_id' => 1,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => $restaurant_image1,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => $restaurant_image2,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => $restaurant_image3,
            ],

            [
                'restaurant_id' => 2,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => $restaurant_image1,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => $restaurant_image2,
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => $restaurant_image3,
            ],

            [
                'restaurant_id' => 3,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => $restaurant_image1,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => $restaurant_image2,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => $restaurant_image3,
            ],

            [
                'restaurant_id' => 4,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => $restaurant_image1,
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => $restaurant_image2,
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => $restaurant_image3,
            ],

            [
                'restaurant_id' => 5,
                'name' => 'First Photo',
                'description' => 'For First Photo.',
                'photo' => $restaurant_image1,
            ],
            [
                'restaurant_id' => 5,
                'name' => 'Second Photo',
                'description' => 'For Second Photo.',
                'photo' => $restaurant_image2,
            ],
            [
                'restaurant_id' => 5,
                'name' => 'Third Photo',
                'description' => 'For Third Photo.',
                'photo' => $restaurant_image3,
            ],

        ];
        $this->restaurant_photo->insert($restaurant_photos);
    }
}
