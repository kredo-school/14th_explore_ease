<?php

namespace App\Enums;

//-----------------------------------------------------
// To use these helper function, do this command.
// composer dump-autoload
//
// How to use Enum:
// take a value: UserTypeEnum::User          => 2
// take a name : UserTypeEnum::User->name    => User
//-----------------------------------------------------

/**
 * Enum for UserType
 */
enum UserTypeEnum: int
{
    case Admin = 1;
    case User = 2;
    case Owner = 3;

    /** 表示用のテキストを取得 */
    public function text(): string
    {
        return match($this) {
            self::Admin => '管理者',
            self::User => 'ユーザー',
            self::Owner => 'オーナー',
        };
    }
}
