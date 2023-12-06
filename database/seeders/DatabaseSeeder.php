<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserTypeSeeder::class,
            AreaTypeSeeder::class,
            NationalitySeeder::class,
            FoodTypeSeeder::class,
            FeatureTypeSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            RestaurantSeeder::class,
            ReviewSeeder::class,
            BookmarkSeeder::class,
            SeatSeeder::class,
            CourseSeeder::class,
            RestaurantPhotoSeeder::class,
            OpenHourSeeder::class,
            FeatureSeeder::class,
            BudgetSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}
