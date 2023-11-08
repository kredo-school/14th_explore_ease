<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FoodType;

class FoodTypeSeeder extends Seeder
{
    private $foodtype;

    public function __construct(FoodType $foodtype)
    {
        $this->foodtype = $foodtype;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodtypes = [
            ['name' => 'No Categtory', 'description' => null],
            ['name' => 'Italian', 'description' => null],
            ['name' => 'Greek', 'description' => null],
            ['name' => 'Chinese', 'description' => null],
            ['name' => 'Japanese', 'description' => null],
            ['name' => 'Korean', 'description' => null],
            ['name' => 'Mexican', 'description' => null],
            ['name' => 'Persian', 'description' => null],
            ['name' => 'French', 'description' => null],
            ['name' => 'American', 'description' => null],
        ];
        $this->foodtype->insert($foodtypes);
    }
}
