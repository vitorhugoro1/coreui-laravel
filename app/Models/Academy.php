<?php

namespace App\Models;

use App\Helpers\UserRules;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use UserRules;

    protected $fillable = ['name', 'master_id', 'master', 'zip_code', 'address_1', 'address_2', 'city', 'state', 'country'];

    public function master()
    {
        return $this->hasOne(User::class, 'id', 'master_id');
    }
}
