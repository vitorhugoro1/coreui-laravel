<?php

namespace App\Domain\Championship\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Ticket extends DataTransferObject
{
    /** @var string */
    public $name;

    public $event_id;

    public $open_date;

    public $close_date;

    /** @var boolean */
    public $is_free;

    /** @var integer */
    public $quantity;

    /** @var float|null */
    public $amount;

    /** @var \App\Domain\Championship\DTO\TicketOption[]|null */
    public $options;

    public static function fromRequest($request, int $id): self
    {
        $data = $request->only([
            'open_date',
        ]);

        $data['event_id'] = $id;

        return new self($data);
    }
}
