<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icao')->unique();
            $table->string('iata');
            $table->boolean('major');
            $table->string('name');
            $table->string('city');
            $table->double('lat');
            $table->double('lon');
            $table->integer('elevation');
            $table->integer('transition_altitude');
            $table->integer('msa');
            $table->string('weather_station')->nullable();
            $table->integer('maps_zoom');
            $table->text('overview')->nullable();
            $table->text('vfr_overview')->nullable();
            $table->text('procedures')->nullable();
            $table->string('sector_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
