<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed $user
 * @property int $id
 */
class Championship extends Model
{
    protected $fillable = ['title', 'slug', 'type', 'status', 'content', 'is_comment', 'author_id'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @return User|HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'author_id');
    }

    /**
     * @return bool
     */
    public function createdByMe()
    {
        if (Auth::user()->id === $this->attributes['author_id']) {
            return true;
        }

        return false;
    }
}
