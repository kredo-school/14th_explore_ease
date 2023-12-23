<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Budget;
use App\Enums\TimezoneTypeEnum;

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
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 1,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],

            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 2,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],

            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 3,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],

            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 4,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],

            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Lunch,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 1,
                'budgetvalue' => '\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 2,
                'budgetvalue' => '\\\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 3,
                'budgetvalue' => '\\\\\\',
            ],
            [
                'restaurant_id' => 5,
                'timezonetype' => TimezoneTypeEnum::Dinner,
                'budgetindex' => 4,
                'budgetvalue' => '\\\\\\\\',
            ],
        ];
        $this->budget->insert($budgets);
    }
}
