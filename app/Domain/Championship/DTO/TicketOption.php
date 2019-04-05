<?php

namespace App\Domain\Championship\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class TicketOption extends DataTransferObject
{
    /** @var string */
    public $method;

    /** @var array|null */
    public $bank_list;

    /** @var string|null */
    public $api_key;

    /** @var string|null */
    public $api_secret;
}
