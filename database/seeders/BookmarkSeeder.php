<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookmark;
use DateTime;

class BookmarkSeeder extends Seeder
{
    private $bookmark;

    public function __construct(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookmarks = [
            [
                'user_id' => 6,
                'restaurant_id' => 1,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 2,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 3,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 4,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 6,
                'restaurant_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 7,
                'restaurant_id' => 1,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 2,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 3,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 4,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'restaurant_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 8,
                'restaurant_id' => 1,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 2,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 3,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 4,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'restaurant_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 9,
                'restaurant_id' => 1,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 2,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 3,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 4,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'restaurant_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 10,
                'restaurant_id' => 1,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 2,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 3,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 4,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'restaurant_id' => 5,

                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->bookmark->insert($bookmarks);
    }
}
