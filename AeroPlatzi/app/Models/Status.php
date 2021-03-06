<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model{
    public $timestamps = false;
    public $table = 'status';
    protected $fillable = [
        'Name','Description',
    ];

    protected $hidden = [];
}

?>