<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use Tests\TestCase;
use App\Domain\Championship\DTO\Ticket;

class TicketTest extends TestCase
{
    /**
     * @test
     */
    public function ticket_can_fill_from_request()
    {
        $data = [
            'payment_method' => [
                'bank_cash'
            ],
            'amount' => '100,00',
            'subscription_period' => "07/04/2019 - 07/05/2019",
            'is_free' => "false",
            'limit_per_use' => '0'
        ];

        $request = new Request([], $data);

        $ticket = Ticket::fromRequest($request, 1);

        $this->assertEquals('2019-04-07', $ticket->open_date->toDateString());
        $this->assertEquals('2019-05-07', $ticket->close_date->toDateString());
        $this->assertIsFloat($ticket->amount);
        $this->assertEquals(100.00, $ticket->amount);
        $this->assertFalse($ticket->is_free);
        $this->assertEquals(0, $ticket->quantity);
    }
}
