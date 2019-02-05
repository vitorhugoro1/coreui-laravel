<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeBracket extends Model
{
    protected $table = 'age_bracket';

    protected $fillable = ['name', 'min', 'max'];
}
