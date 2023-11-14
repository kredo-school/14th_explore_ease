<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use DateTime;

class ReviewSeeder extends Seeder
{
    private $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'user_id' => 6,
                'restaurant_id' => 1,
                'star' => 1,
                'comment' => 'This restaurant is one star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 2,
                'star' => 2,
                'comment' => 'This restaurant is two star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 3,
                'star' => 3,
                'comment' => 'This restaurant is three star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 4,
                'star' => 4,
                'comment' => 'This restaurant is four star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 5,
                'star' => 5,
                'comment' => 'This restaurant is five star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 7,
                'restaurant_id' => 1,
                'star' => 1,
                'comment' => 'This restaurant is one star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 2,
                'star' => 2,
                'comment' => 'This restaurant is two star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 3,
                'star' => 3,
                'comment' => 'This restaurant is three star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 4,
                'star' => 4,
                'comment' => 'This restaurant is four star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 5,
                'star' => 5,
                'comment' => 'This restaurant is five star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 8,
                'restaurant_id' => 1,
                'star' => 1,
                'comment' => 'This restaurant is one star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 2,
                'star' => 2,
                'comment' => 'This restaurant is two star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 3,
                'star' => 3,
                'comment' => 'This restaurant is three star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 4,
                'star' => 4,
                'comment' => 'This restaurant is four star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 5,
                'star' => 5,
                'comment' => 'This restaurant is five star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 9,
                'restaurant_id' => 1,
                'star' => 1,
                'comment' => 'This restaurant is one star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 2,
                'star' => 2,
                'comment' => 'This restaurant is two star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 3,
                'star' => 3,
                'comment' => 'This restaurant is three star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 4,
                'star' => 4,
                'comment' => 'This restaurant is four star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 5,
                'star' => 5,
                'comment' => 'This restaurant is five star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 10,
                'restaurant_id' => 1,
                'star' => 1,
                'comment' => 'This restaurant is one star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 2,
                'star' => 2,
                'comment' => 'This restaurant is two star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 3,
                'star' => 3,
                'comment' => 'This restaurant is three star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 4,
                'star' => 4,
                'comment' => 'This restaurant is four star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 5,
                'star' => 5,
                'comment' => 'This restaurant is five star.',

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->review->insert($reviews);
    }
}
