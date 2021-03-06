<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model{
    public $timestamps = false;
    protected $fillable = [
        'IDRoute','IDStatus','ArrievedTime','DeparturedTime','BordingGate','PassengerNumber',
    ];

    protected $hidden = [];
}

?>