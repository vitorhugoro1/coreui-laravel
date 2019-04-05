<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTicket extends Model
{
    use SoftDeletes;

    protected $table = 'event_ticket';

    protected $fillable = [
        'name', 'event_id', 'open_date', 'close_date', 'is_free', 'quantity', 'amount', 'options',
    ];

    protected $dates = ['open_date', 'close_date'];

    protected $casts = [
        'amount' => 'decimal',
        'quantity' => 'integer',
        'is_free' => 'boolean',
        'options' => 'json',
    ];

    public function event()
    {
        return $this->belongsTo(Championship::class, 'event_id');
    }
}
