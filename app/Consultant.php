<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = [
        'id_consultant',
        'firstname',
        'lastname',
        'level',
        'registeredBy'
    ];

    protected $primaryKey = 'id_consultant';

    public $incrementing = false;

    protected $keyType = 'integer';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
