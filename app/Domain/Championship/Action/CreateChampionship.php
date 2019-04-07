<?php

namespace App\Domain\Championship\Action;

use App\Domain\Championship\DTO\Period;
use App\Domain\Championship\DTO\Ticket;
use App\Models\Championship;
use Illuminate\Http\Request;

class CreateChampionship
{
    /** @var \Illuminate\Http\Request */
    private $request;

    /**
     * @var array
     */
    private $defaultValues = [
        'is_comment' => false,
        'status'     => Championship::PUBLISHED,
        'type'       => 'championship',
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param array $optionals
     *
     * @return Championship|null
     */
    public function create(array $optionals = []): ?Championship
    {
        $data = $this->getData($optionals);

        $championship = Championship::create($data);

        $ticket = Ticket::fromRequest($this->request, $championship->id);
        $period = Period::fromRequest($this->request, $championship->id);

        $championship->tickets->create($ticket->toArray());
        $championship->period->create($period->toArray());

        return $championship;
    }

    /**
     * @param array $optionals
     *
     * @return array
     */
    private function getData(array $optionals): array
    {
        $data = $this->request->only(['title', 'content']);

        return array_merge_recursive($data, $this->defaultValues, $optionals);
    }
}
