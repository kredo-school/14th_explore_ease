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
 * Enum for TimezoneType
 */
enum TimezoneTypeEnum: int
{
    case Lunch = 1;
    case Dinner = 2;

    /** 表示用のテキストを取得 */
    public function text(): string
    {
        return match($this) {
            self::Lunch => 'ランチ',
            self::Dinner => 'ディナー',
        };
    }
}
