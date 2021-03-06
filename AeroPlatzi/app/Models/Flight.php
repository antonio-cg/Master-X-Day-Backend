<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Fligth extends Model{
    public $timestamps = false;
    protected $fillable = [
        'IDRoute','IDStatus','ArrievedTime','DeparturedTime','BordingGate','PassengerNumber',
    ];

    protected $hidden = [];
}

?>