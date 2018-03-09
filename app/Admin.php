<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'id_admin',
        'firstName',
        'lastName',
        'registeredBy'
    ];

    protected $primaryKey = 'id_admin';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function user() {
        return $this->belongsTo('App\User');
    }

    //Descomentar cuando se cree el modelo de request
    /*
    public function request() {
        return $this->hasMany('App\request');
    }
    */
}
