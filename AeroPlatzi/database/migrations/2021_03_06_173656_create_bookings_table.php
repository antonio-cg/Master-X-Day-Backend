<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('IDBooking');
            $table->unsignedBigInteger('IDUser')->nullable(false);  
            $table->unsignedBigInteger('IDFlight')->nullable(false);  
            $table->timestamp('ReservationDate');

            $table->foreign('IDUser')->references('IDUser')->on('users');
            $table->foreign('IDFlight')->references('IDFlight')->on('flights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
