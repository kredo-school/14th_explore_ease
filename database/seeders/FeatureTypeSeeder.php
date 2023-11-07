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
            ['name' => 'Vegetarian'],
            ['name' => 'Vegan'],
            ['name' => 'Islam'],
            ['name' => 'Hindu'],
            ['name' => 'Judaism'],
            ['name' => 'Jainism'],
        ];
        $this->featuretype->insert($featuretypes);
    }
}
