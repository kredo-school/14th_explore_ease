<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    private $usertype;

    public function __construct(UserType $usertype)
    {
        $this->usertype = $usertype;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usertypes = [
            [
                'name' => 'Admin',
                'description' => '[1] Administrator of explore-ease'
            ],
            [
                'name' => 'User',
                'description' => '[2] User of explore-ease'
            ],
            [
                'name' => 'Owner',
                'description' => '[3] Owner of restaurant'
            ],
        ];
        $this->usertype->insert($usertypes);
    }
}
