<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model{
    public $timestamps = false;
    protected $primaryKey = 'IDAirport';
    protected $fillable = [
        'IataCode',"Airportname",
    ];

    protected $hidden = [];
}

?>