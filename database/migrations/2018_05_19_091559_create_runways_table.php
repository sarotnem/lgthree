<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runways', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airport_id')->unsigned();
            $table->string('designator');
            $table->boolean('preferred_departure');
            $table->boolean('preferred_arrival');
            $table->integer('heading');
            $table->integer('length');
            $table->integer('elevation');
            $table->boolean('ils');
            $table->string('ils_frequency')->nullable();
            $table->string('glidepath');
            $table->double('arrival_lat');
            $table->double('arrival_lon');
            $table->double('departure_lat');
            $table->double('departure_lon');
            $table->timestamps();

            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runways');
    }
}
