<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'id_report',
        'arrival_time',
        'finishing_time',
        'comments'
    ];

    protected $primaryKey = 'id_report';

    public $incrementing = true;

    protected $keyType = 'integer';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
