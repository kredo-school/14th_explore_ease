<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeatureType;

class FeatureTypeSeeder extends Seeder
{
    private $featuretype;

    public function __construct(FeatureType $featuretype)
    {
        $this->featuretype = $featuretype;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $featuretypes = [
            ['name' => 'free of gluten', 'description' => 'don\'t include gluten.'],
            ['name' => 'Vegetarian', 'description' => 'can\'t eat meats but egg and milk are possible.'],
            ['name' => 'Vegan', 'description' => 'can eat vegetables only.'],
            ['name' => 'Islam', 'description' => 'can\'t eat pigs meat and can\'t drink alcohol.'],
            ['name' => 'Hindu', 'description' => 'can\'t eat cows and pigs meat.'],
            ['name' => 'Judaism', 'description' => 'can\'t eat meat except for chiken and fish.'],
            ['name' => 'Jainism', 'description' => 'can\'t eat meat and some vegetables.'],
        ];
        $this->featuretype->insert($featuretypes);
    }
}
