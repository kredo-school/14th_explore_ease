<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    private $feature;

    public function __construct(Feature $feature)
    {
        $this->feature = $feature;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'restaurant_id' => 1,
                'featuretype_id' => 1,
            ],
            [
                'restaurant_id' => 1,
                'featuretype_id' => 5,
            ],

            [
                'restaurant_id' => 2,
                'featuretype_id' => 1,
            ],
            [
                'restaurant_id' => 2,
                'featuretype_id' => 5,
            ],

            [
                'restaurant_id' => 3,
                'featuretype_id' => 1,
            ],
            [
                'restaurant_id' => 3,
                'featuretype_id' => 5,
            ],

            [
                'restaurant_id' => 4,
                'featuretype_id' => 1,
            ],
            [
                'restaurant_id' => 4,
                'featuretype_id' => 5,
            ],

            [
                'restaurant_id' => 5,
                'featuretype_id' => 1,
            ],
            [
                'restaurant_id' => 5,
                'featuretype_id' => 5,
            ],
        ];
        $this->feature->insert($features);
    }
}
