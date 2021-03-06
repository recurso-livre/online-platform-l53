<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Promover o relacionamento (User -> Address)
    public function addresses()
    {
        return $this->belongsToMany('App\Address', 'user_address');
    }

    // Promover o relacionamento (User -> Resource)
    public function resources()
    {
        return $this->hasMany('App\Resource');
    }
}
