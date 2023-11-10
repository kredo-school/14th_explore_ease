<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Budget;

class BudgetSeeder extends Seeder
{
    private $budget;

    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    /**
     * Run the database seeds.
     * timezonetype
     * 0: Lunch
     * 1: Dinner
     */
    public function run(): void
    {
        $budgets = [
            [
                'restaurant_id' => 1,
                'timezonetype' => 0,
                'budget' => 2000,
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => 1,
                'budget' => 4000,
            ],

            [
                'restaurant_id' => 2,
                'timezonetype' => 0,
                'budget' => 2000,
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => 1,
                'budget' => 4000,
            ],

            [
                'restaurant_id' => 3,
                'timezonetype' => 0,
                'budget' => 2000,
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => 1,
                'budget' => 4000,
            ],

            [
                'restaurant_id' => 4,
                'timezonetype' => 0,
                'budget' => 2000,
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => 1,
                'budget' => 4000,
            ],

            [
                'restaurant_id' => 5,
                'timezonetype' => 0,
                'budget' => 2000,
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => 1,
                'budget' => 4000,
            ],
        ];
        $this->budget->insert($budgets);
    }
}
