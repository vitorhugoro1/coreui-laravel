<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table = 'organizer';

    protected $fillable = ['user_id', 'name', 'contact', 'address', 'email'];

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFromUser($query, int $id)
    {
        return $query->where('user_id', $id);
    }
}
