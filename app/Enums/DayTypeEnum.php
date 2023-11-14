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
 * Enum for DayType
 */
enum DayTypeEnum: int
{
    case Monday = 1;
    case Tuesday = 2;
    case Wednesday = 3;
    case Thursday = 4;
    case Friday = 5;
    case Saturday = 6;
    case Sunday = 0;
    case NationalHoliday = 7;

    /** 表示用のテキストを取得 */
    public function text(): string
    {
        return match($this) {
            self::Monday => '月曜日',
            self::Tuesday => '火曜日',
            self::Wednesday => '水曜日',
            self::Thursday => '木曜日',
            self::Friday => '金曜日',
            self::Saturday => '土曜日',
            self::Sunday => '日曜日',
            self::NationalHoliday => '祝日',
        };
    }
}
