<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model{
    public $timestamps = false;
    protected $fillable = [
        'IDRoute','IDStatus','ArrievedTime','DeparturedTime','BoardingGate','PassengerNumber',
    ];

    protected $hidden = [];
}

?>