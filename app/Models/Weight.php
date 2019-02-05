<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = ['min', 'max', 'gender', 'team', 'age_bracket', 'weapon', 'payload', 'age', 'category_id'];

    protected $casts = [
        'min'   => 'float',
        'max'   => 'float',
        'team'  => 'boolean',
        'age_bracket'   => 'boolean',
        'weapon'    => 'boolean',
        'payload'   => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
