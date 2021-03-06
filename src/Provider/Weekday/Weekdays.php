<?php

/*
 * This file is part of the umulmrum/holiday package.
 *
 * (c) Stefan Kruppa
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace umulmrum\Holiday\Provider\Weekday;

use umulmrum\Holiday\Constant\HolidayType;
use umulmrum\Holiday\Model\HolidayList;
use umulmrum\Holiday\Provider\HolidayProviderInterface;

abstract class Weekdays implements HolidayProviderInterface
{
    use WeekdayTrait;

    /**
     * @var int
     */
    private $weekday;
    /**
     * @var int
     */
    private $additionalType;

    public function __construct(int $weekday, int $additionalType = HolidayType::OTHER)
    {
        $this->weekday = $weekday;
        $this->additionalType = $additionalType;
    }

    /**
     * {@inheritdoc}
     */
    public function calculateHolidaysForYear(int $year): HolidayList
    {
        return new HolidayList($this->getWeekdays($year, $this->weekday, $this->additionalType));
    }
}
