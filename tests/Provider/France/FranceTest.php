<?php

/*
 * This file is part of the umulmrum/holiday package.
 *
 * (c) Stefan Kruppa
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace umulmrum\Holiday\Test\Provider\France;

use umulmrum\Holiday\Provider\France\France;
use umulmrum\Holiday\Test\Calculator\AbstractHolidayCalculatorTest;

final class FranceTest extends AbstractHolidayCalculatorTest
{
    /**
     * {@inheritdoc}
     */
    protected function getHolidayProviders(): array
    {
        return [
            France::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [
            [
                2004,
                [
                    '2004-01-01',
                    '2004-04-12',
                    '2004-05-01',
                    '2004-05-08',
                    '2004-05-20',
                    '2004-05-30',
                    '2004-07-14',
                    '2004-08-15',
                    '2004-11-01',
                    '2004-11-11',
                    '2004-12-25',
                ],
            ],
            [
                2019,
                [
                    '2019-01-01',
                    '2019-04-22',
                    '2019-05-01',
                    '2019-05-08',
                    '2019-05-30',
                    '2019-06-09',
                    '2019-06-10',
                    '2019-07-14',
                    '2019-08-15',
                    '2019-11-01',
                    '2019-11-11',
                    '2019-12-25',
                ],
            ],
        ];
    }
}
