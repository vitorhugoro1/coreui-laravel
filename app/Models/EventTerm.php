<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTerm extends Model
{
    use SoftDeletes;

    protected $table = 'event_term';

    protected $fillable = [
        'name', 'body', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
