<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Fligth extends Model{
    protected $fillable = [
        'IDRoute','IDStatus','ArrievedTime','DeparturedTime','BordingGate','PassengerNumber',
    ];

    protected $hidden = [];
}

?>