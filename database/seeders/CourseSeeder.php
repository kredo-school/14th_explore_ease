<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // set 20M on mysql's max_allowed_packet temporarily to avoid over packet size
        //DB::statement('SET GLOBAL max_allowed_packet=20971520');

        $course_image1 = 'data:image/' . 'jpg' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/course_1.jpg'));
        $course_image2 = 'data:image/' . 'jpg' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/course_2.jpg'));
        $course_image3 = 'data:image/' . 'jpg' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/course_3.jpg'));

        $courses = [
            [
                'restaurant_id' => 1,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => $course_image1,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 1,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => $course_image2,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 1,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => $course_image3,
                'reservation_minutes' => 120,
            ],
        ];
        $this->course->insert($courses);
        $courses = [
            [
                'restaurant_id' => 2,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => $course_image1,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 2,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => $course_image2,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 2,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => $course_image3,
                'reservation_minutes' => 120,
            ],
        ];
        $this->course->insert($courses);
        $courses = [
            [
                'restaurant_id' => 3,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => $course_image1,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 3,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => $course_image2,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 3,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => $course_image3,
                'reservation_minutes' => 120,
            ],
        ];
        $this->course->insert($courses);
        $courses = [
            [
                'restaurant_id' => 4,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => $course_image1,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 4,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => $course_image2,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 4,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => $course_image3,
                'reservation_minutes' => 120,
            ],
        ];
        $this->course->insert($courses);
        $courses = [
            [
                'restaurant_id' => 5,
                'name' => '1 hour course',
                'description' => 'For 1 hour course.',
                'price' => 3000,
                'photo' => $course_image1,
                'reservation_minutes' => 60,
            ],
            [
                'restaurant_id' => 5,
                'name' => '1.5 hour course',
                'description' => 'For 1.5 hour course.',
                'price' => 4000,
                'photo' => $course_image2,
                'reservation_minutes' => 90,
            ],
            [
                'restaurant_id' => 5,
                'name' => '2 hour course',
                'description' => 'For 2 hour course.',
                'price' => 5000,
                'photo' => $course_image3,
                'reservation_minutes' => 120,
            ],

        ];
        $this->course->insert($courses);
    }
}
