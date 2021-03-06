<?php

/*
 * This file is part of the umulmrum/holiday package.
 *
 * (c) Stefan Kruppa
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace umulmrum\Holiday\Test\Calculator;

use umulmrum\Holiday\HolidayCalculator;
use umulmrum\Holiday\Model\HolidayList;
use umulmrum\Holiday\Test\HolidayTestCase;

abstract class AbstractHolidayCalculatorTest extends HolidayTestCase
{
    /**
     * @var HolidayCalculator
     */
    protected $holidayCalculator;
    /**
     * @var HolidayList
     */
    protected $actualResult;

    /**
     * @test
     * @dataProvider getData
     */
    public function it_computes_the_correct_holidays(int $year, array $expectedResult): void
    {
        $this->givenAHolidayCalculator();
        $this->whenICallCalculate($year);
        $this->thenTheCorrectHolidaysShouldBeCalculated($expectedResult);
    }

    abstract public function getData(): array;

    private function givenAHolidayCalculator(): void
    {
        $this->holidayCalculator = new HolidayCalculator();
    }

    abstract protected function getHolidayProviders(): array;

    protected function whenICallCalculate(int $year): void
    {
        $this->actualResult = $this->holidayCalculator->calculate($this->getHolidayProviders(), $year);
    }

    protected function thenTheCorrectHolidaysShouldBeCalculated(array $expectedResult): void
    {
        $actualResult = [];
        foreach ($this->actualResult as $actualHoliday) {
            $actualResult[] = $actualHoliday->getSimpleDate();
        }
        \sort($actualResult);
        self::assertEquals($expectedResult, $actualResult);
    }
}
