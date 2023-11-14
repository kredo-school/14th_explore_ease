<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OpenHour;
use App\Enums\DayTypeEnum;

class OpenHourSeeder extends Seeder
{
    private $openhour;

    public function __construct(OpenHour $openhour)
    {
        $this->openhour = $openhour;
    }

    /**
     * Run the database seeds.
     * daytype
     * 0: Sunday
     * 1: Monday
     * 2: Tuesday
     * 3: Wednesday
     * 4: Thursday
     * 5: Friday
     * 6: Saturday
     * 7: National Holiday
     */
    public function run(): void
    {
        $openhours = [
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Monday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Tuesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Wednesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Thursday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Friday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Saturday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::Sunday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => DayTypeEnum::NationalHoliday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Monday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Tuesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Wednesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Thursday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Friday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Saturday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::Sunday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => DayTypeEnum::NationalHoliday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Monday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Tuesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Wednesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Thursday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Friday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Saturday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::Sunday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => DayTypeEnum::NationalHoliday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Monday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Tuesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Wednesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Thursday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Friday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Saturday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::Sunday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => DayTypeEnum::NationalHoliday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Monday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Tuesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Wednesday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Thursday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Friday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Saturday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::Sunday,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => DayTypeEnum::NationalHoliday,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
        ];
        $this->openhour->insert($openhours);
    }
}
