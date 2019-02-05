<?php

namespace App\Models;

use App\Events\UsersCreated;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UsersCreated::class,
    ];

    public function isAssociated()
    {
        return $this->hasRole('associated');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function organizer()
    {
        return $this->hasMany(Organizer::class);
    }
}
