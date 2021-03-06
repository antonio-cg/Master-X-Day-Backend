<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model{
    protected $fillable = [
        'name','description',
    ];

    protected $hidden = [];
}

?>