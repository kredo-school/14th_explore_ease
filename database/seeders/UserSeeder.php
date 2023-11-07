<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use DateTime;

class UserSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin001',
                'email' => 'admin001@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'admin002',
                'email' => 'admin002@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'admin003',
                'email' => 'admin003@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'admin004',
                'email' => 'admin004@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'admin005',
                'email' => 'admin005@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'user001',
                'email' => 'user001@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'user002',
                'email' => 'user002@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'user003',
                'email' => 'user003@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'user004',
                'email' => 'user004@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'user005',
                'email' => 'user005@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'owner001',
                'email' => 'owner001@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'owner002',
                'email' => 'owner002@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'owner003',
                'email' => 'owner003@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'owner004',
                'email' => 'owner004@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'owner005',
                'email' => 'owner005@ee.com',
                'password' => '$2y$10$/1kzy7yWNDs2k5Axxu7fzODGPcCjnPNbPV3E.jy8p25TXgfL99Mh6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->user->insert($users);
    }
}
