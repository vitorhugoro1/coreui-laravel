<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FighterLevel extends Model
{
    protected $table = 'experience';

    protected $fillable = ['name', 'min', 'max'];
}
