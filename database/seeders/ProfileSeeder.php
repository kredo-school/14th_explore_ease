<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Enums\UserTypeEnum;
use DateTime;

class ProfileSeeder extends Seeder
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'user_id' => 1,
                'first_name' => 'name001',
                'last_name' => 'Admin',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 2,
                'first_name' => 'name002',
                'last_name' => 'Admin',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 3,
                'first_name' => 'name003',
                'last_name' => 'Admin',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 4,
                'first_name' => 'name004',
                'last_name' => 'Admin',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 5,
                'first_name' => 'name005',
                'last_name' => 'Admin',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 6,
                'first_name' => 'name001',
                'last_name' => 'User',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'first_name' => 'name002',
                'last_name' => 'User',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'first_name' => 'name003',
                'last_name' => 'User',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'first_name' => 'name004',
                'last_name' => 'User',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'first_name' => 'name005',
                'last_name' => 'User',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],

            [
                'user_id' => 11,
                'first_name' => 'name001',
                'last_name' => 'Owner',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 12,
                'first_name' => 'name002',
                'last_name' => 'Owner',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 13,
                'first_name' => 'name003',
                'last_name' => 'Owner',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 14,
                'first_name' => 'name004',
                'last_name' => 'Owner',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 15,
                'first_name' => 'name005',
                'last_name' => 'Owner',
                'avatar' => null,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationarity_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->profile->insert($profiles);
    }
}
