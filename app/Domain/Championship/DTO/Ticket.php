<?php

namespace App\Domain\Championship\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class Ticket extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var integer */
    public $event_id;

    /** @var \Carbon\Carbon */
    public $open_date;

    /** @var \Carbon\Carbon */
    public $close_date;

    /** @var boolean */
    public $is_free;

    /** @var integer */
    public $quantity;

    /** @var float|null */
    public $amount;

    /** @var \App\Domain\Championship\DTO\TicketOption[]|null */
    public $options;

    /**
     * @param Request $request
     * @param int $id
     *
     * @return Ticket
     */
    public static function fromRequest(Request $request, int $id): Ticket
    {
        $period = explode(' - ', $request->get('subscription_period'));

        $open_date = array_first($period);
        $close_date = array_last($period);

        $options = [];
        $methods = $request->get('payment_method', []);

        foreach ($methods as $method) {
            $options[] = [
                'method' => $method
            ];
        }

        $data = [
            'name' => 'Qualquer coisa',
            'event_id'    => $id,
            'open_date'   => Carbon::createFromFormat('d/m/Y', $open_date),
            'close_date'  => Carbon::createFromFormat('d/m/Y', $close_date),
            'quantity' => intval($request->get('limit_per_user')),
            'is_free' => boolval($request->get('is_free')),
            'amount' => floatval($request->get('amount')),
            'options' => $options
        ];

        return new Ticket($data);
    }
}
