<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model{
    public $timestamps = false;
    protected $fillable = [
        'name','description',
    ];

    protected $hidden = [];
}

?>