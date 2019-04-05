<?php

namespace App\Domain\Championship\Action;

use App\Domain\Championship\DTO\Ticket;
use App\Models\Championship;
use Illuminate\Http\Request;

class CreateChampionship
{
    /** @var \Illuminate\Http\Request */
    private $request;

    private $defaultValues = [
        'is_comment' => false,
        'status' => Championship::PUBLISHED,
        'type' => 'championship',
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create(array $optionals = [])
    {
        $data = $this->request->only(['title', 'content']);
        $data = array_merge_recursive($data, $this->defaultValues, $optionals);
        $championship = Championship::create($data);

        $ticket = Ticket::fromRequest($this->request, $championship->id);

        $championship->tickets()->create($ticket->toArray());

        $period = [
            'event_id' => $campeonato['id'],
            'open_date' => now()->addMonths(3),
            'close_date' => now()->addMonths(3)->addDay(1),
            'is_full_day' => false,
        ];
    }
}
