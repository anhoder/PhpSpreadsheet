<?php

namespace PhpOffice\PhpSpreadsheetTests\Style\NumberFormat\Wizard;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat\Wizard\Time;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    /**
     * @dataProvider providerTime
     *
     * @param null|string|string[] $separators
     * @param string[] $formatBlocks
     */
    public function testTime(string $expectedResult, $separators, array $formatBlocks): void
    {
        $wizard = new Time($separators, ...$formatBlocks);
        self::assertSame($expectedResult, (string) $wizard);
    }

    public function providerTime(): array
    {
        return [
            ['hh:mm:ss', Time::SEPARATOR_COLON, [Time::HOURS_LONG, Time::MINUTES_LONG, Time::SECONDS_LONG]],
            ['hh:mm', Time::SEPARATOR_COLON, [Time::HOURS_LONG, Time::MINUTES_LONG]],
            ['hh:mm AM/PM', [Time::SEPARATOR_COLON, Time::SEPARATOR_SPACE], [Time::HOURS_LONG, Time::MINUTES_LONG, Time::MORNING_AFTERNOON]],
            ['h "hours and" m "minutes past midnight"', Time::SEPARATOR_SPACE, [Time::HOURS_SHORT, 'hours and', Time::MINUTES_SHORT, 'minutes past midnight']],
        ];
    }
}
