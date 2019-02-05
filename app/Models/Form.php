<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'weapon', 'team', 'payload', 'category_id'];

    protected $casts = [
        'payload'   => 'json',
        'team' => 'boolean',
        'weapon' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
