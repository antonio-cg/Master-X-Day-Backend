<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'IDRoute';

    protected $fillable = [
        'IDDepartured', 'IDArrieved', 'Name',
    ];

    protected $hidden = [];
}
