<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'date_payment'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function driver()
    {
        return $this->hasOne('App\Driver');
    }

    public function car()
    {
        return $this->hasOne('App\Car');
    }

    public function cars()
    {
        return $this->hasMany('App\Car');
    }
}
