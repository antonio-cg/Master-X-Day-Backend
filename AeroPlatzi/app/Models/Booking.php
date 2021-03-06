<?php

namespace app\Models;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model{
    public $timestamps = false;
    protected $primaryKey = 'IDBooking';
    protected $fillable = [
        'IDUser','IDFlight','ReservationDate'
    ];

    protected $hidden = [];
}

?>