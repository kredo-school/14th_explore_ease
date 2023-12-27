<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // set 20M on mysql's max_allowed_packet temporarily to avoid over packet size
        //DB::statement('SET GLOBAL max_allowed_packet=20971520');

        $avatar_image = 'data:image/' . 'png' . ';base64,' . base64_encode(file_get_contents('public/assets/seeder/avatar_penguin.png'));

        $profiles = [
            [
                'user_id' => 1,
                'first_name' => 'name001',
                'last_name' => 'Admin',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 2,
                'first_name' => 'name002',
                'last_name' => 'Admin',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 3,
                'first_name' => 'name003',
                'last_name' => 'Admin',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 4,
                'first_name' => 'name004',
                'last_name' => 'Admin',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 5,
                'first_name' => 'name005',
                'last_name' => 'Admin',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Admin,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->profile->insert($profiles);
        $profiles = [
            [
                'user_id' => 6,
                'first_name' => 'name001',
                'last_name' => 'User',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 7,
                'first_name' => 'name002',
                'last_name' => 'User',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 8,
                'first_name' => 'name003',
                'last_name' => 'User',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 9,
                'first_name' => 'name004',
                'last_name' => 'User',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 10,
                'first_name' => 'name005',
                'last_name' => 'User',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::User,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->profile->insert($profiles);
        $profiles = [
            [
                'user_id' => 11,
                'first_name' => 'name001',
                'last_name' => 'Owner',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 12,
                'first_name' => 'name002',
                'last_name' => 'Owner',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 13,
                'first_name' => 'name003',
                'last_name' => 'Owner',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 14,
                'first_name' => 'name004',
                'last_name' => 'Owner',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 15,
                'first_name' => 'name005',
                'last_name' => 'Owner',
                'avatar' => $avatar_image,
                'phone' => '999-9999-9999',
                'usertype_id' => UserTypeEnum::Owner,
                'nationality_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $this->profile->insert($profiles);
    }
}
