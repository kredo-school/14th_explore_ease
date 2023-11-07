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
            ['name' => 'Italian'],
            ['name' => 'Greek'],
            ['name' => 'Chinese'],
            ['name' => 'Japanese'],
            ['name' => 'Korean'],
            ['name' => 'Mexican'],
            ['name' => 'Persian'],
            ['name' => 'French'],
            ['name' => 'American'],
        ];
        $this->foodtype->insert($foodtypes);
    }
}
