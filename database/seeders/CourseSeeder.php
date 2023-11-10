<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'restaurant_id' => 1,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 1,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => null,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 1,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => null,
                'reservation_minutes' => 120,
            ],

            [
                'restaurant_id' => 2,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 2,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => null,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 2,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => null,
                'reservation_minutes' => 120,
            ],

            [
                'restaurant_id' => 3,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 3,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => null,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 3,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => null,
                'reservation_minutes' => 120,
            ],

            [
                'restaurant_id' => 4,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 4,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => null,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 4,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => null,
                'reservation_minutes' => 120,
            ],

            [
                'restaurant_id' => 5,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => null,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 5,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => null,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 5,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => null,
                'reservation_minutes' => 120,
            ],

        ];
        $this->course->insert($courses);
    }
}
