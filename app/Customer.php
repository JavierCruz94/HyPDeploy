<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id_customer',
        'code',
        'name',
        'registeredBy'
    ];

    protected $primaryKey = 'id_customer';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function user() {
        return $this->belongsTo('App\User');
    }

}
