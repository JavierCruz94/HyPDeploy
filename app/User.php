<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'username',
        'password',
        'email',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isConsultant()
    {
        return $this->role == 'consultant';
    }

    public function isCustomer()
    {
        return $this->role == 'customer';
    }

    public function userInfo()
    {
        if ($this->role == 'admin') {
            return $this->hasOne('App\Admin');
        }

        if ($this->role == 'consultant') {
            return $this->hasOne('App\Consultant');
        }

        if ($this->role == 'customer') {
            return $this->hasOne('App\Customer');
        }

        return false;
    }
}
