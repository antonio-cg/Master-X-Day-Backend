<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id('IDRoute');
            $table->unsignedBigInteger('IDDepartured')->nullable(false);
            $table->unsignedBigInteger('IDArrieved')->nullable(false);
            $table->string('Name',30);
            $table->foreign('IDDepartured')->references('IDAirport')->on('airports');
            $table->foreign('IDArrieved')->references('IDAirport')->on('airports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
