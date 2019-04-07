<?php

namespace App\Domain\Championship\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class Period extends DataTransferObject
{
    /** @var integer */
    public $event_id;

    /** @var \Carbon\Carbon */
    public $open_date;

    /** @var \Carbon\Carbon */
    public $close_date;

    /** @var boolean */
    public $is_full_day;

    /**
     * @param Request $request
     * @param int $id
     *
     * @return Period
     */
    public static function fromRequest(Request $request, int $id): Period
    {
        $period = explode(' - ', $request->get('period'));

        $open_date = array_first($period);
        $close_date = array_last($period);

        $data = [
            'event_id'    => $id,
            'open_date'   => Carbon::createFromFormat('d/m/Y', $open_date),
            'close_date'  => Carbon::createFromFormat('d/m/Y', $close_date),
            'is_full_day' => $request->get('is_full_day', false),
        ];

        return new Period($data);
    }
}