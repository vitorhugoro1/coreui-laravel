<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBankAccount extends Model
{
    protected $fillable = ['user_id', 'name', 'account_owner', 'owner_document', 'bank', 'agency', 'account_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
