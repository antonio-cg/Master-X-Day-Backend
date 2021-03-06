<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model{
    protected $fillable = [
        'iataCode',"Airport",
    ];

    protected $hidden = [];
}

?>