<?php

/*
 * This file is part of the umulmrum/holiday package.
 *
 * (c) Stefan Kruppa
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace umulmrum\Holiday\Provider\France;

use umulmrum\Holiday\Constant\HolidayName;
use umulmrum\Holiday\Constant\HolidayType;
use umulmrum\Holiday\Model\Holiday;
use umulmrum\Holiday\Model\HolidayList;
use umulmrum\Holiday\Provider\Religion\ChristianHolidaysTrait;

class Martinique extends France
{
    use ChristianHolidaysTrait;

    public function calculateHolidaysForYear(int $year): HolidayList
    {
        $holidays = parent::calculateHolidaysForYear($year);
        $holidays->add($this->getGoodFriday($year, HolidayType::OFFICIAL | HolidayType::DAY_OFF));
        $holidays->add($this->getAbolitionOfSlavery($year, HolidayType::OFFICIAL | HolidayType::DAY_OFF));

        return $holidays;
    }

    private function getAbolitionOfSlavery(int $year, int $additionalType = HolidayType::OTHER): Holiday
    {
        return Holiday::create(HolidayName::ABOLITION_OF_SLAVERY, "{$year}-05-22", HolidayType::OTHER | $additionalType);
    }
}
