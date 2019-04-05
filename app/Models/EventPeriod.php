<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPeriod extends Model
{
    protected $table = 'event_period';

    protected $fillable = [
        'event_id', 'open_date', 'close_date', 'is_full_day',
    ];

    protected $dates = ['open_date', 'close_date'];

    protected $casts = [
        'is_full_day' => 'boolean',
    ];

    public function event()
    {
        return $this->belongsTo(Championship::class, 'event_id');
    }
}
