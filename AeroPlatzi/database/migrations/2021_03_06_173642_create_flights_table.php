<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id('IDFLight');
            $table->unsignedBigInteger('IDRoute')->nullable(false);
            $table->unsignedBigInteger('IDStatus')->nullable(false);
            $table->timestamp('ArrievedTime');
            $table->timestamp('DeparturedTime');
            $table->text('BoardingGate',10);
            $table->integer('PassengerNumber');
            $table->foreign('IDRoute')->references('IDRoute')->on('routes');
            $table->foreign('IDStatus')->references('IDStatus')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
