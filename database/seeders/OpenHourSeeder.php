<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OpenHour;

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
                'daytype' => 1,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 2,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 3,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 4,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 5,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 6,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 0,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 1,
                'daytype' => 7,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 2,
                'daytype' => 1,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 2,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 3,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 4,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 5,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 6,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 0,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 2,
                'daytype' => 7,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 3,
                'daytype' => 1,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 2,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 3,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 4,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 5,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 6,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 0,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 3,
                'daytype' => 7,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 4,
                'daytype' => 1,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 2,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 3,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 4,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 5,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 6,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 0,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 4,
                'daytype' => 7,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],

            [
                'restaurant_id' => 5,
                'daytype' => 1,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 2,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 3,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 4,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 5,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 6,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 0,
                'openinghours' => '11:00',
                'closinghours' => '21:00',
                'closed' => false,
            ],
            [
                'restaurant_id' => 5,
                'daytype' => 7,
                'openinghours' => null,
                'closinghours' => null,
                'closed' => true,
            ],
        ];
        $this->openhour->insert($openhours);
    }
}
