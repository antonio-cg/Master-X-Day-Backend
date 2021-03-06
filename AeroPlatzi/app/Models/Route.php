<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Route extends Model{
    protected $fillable = [
        'IDDepartured','IDArrived','name',

    ];

    protected $hidden = [];
}

?>