<?php


namespace Tests\Unit;

use App\Domain\Championship\DTO\Period;
use Illuminate\Http\Request;
use Tests\TestCase;

class PeriodTest extends TestCase
{
    /**
     * @test
     */
    public function period_can_fill_from_request()
    {
        $data = [
            'period'      => '07/04/2019 - 07/04/2019',
            'is_full_day' => false,
        ];

        $request = new Request([], $data);

        $period = Period::fromRequest($request, 1);

        $this->assertEquals('2019-04-07', $period->open_date->toDateString());
        $this->assertEquals('2019-04-07', $period->close_date->toDateString());
        $this->assertFalse($period->is_full_day);
    }
}