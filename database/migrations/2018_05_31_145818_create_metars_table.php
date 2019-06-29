<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airport_id')->unsigned();
            $table->string('raw_text');
            $table->string('observation_time')->nullable();
            $table->float('temperature')->nullable();
            $table->float('dewpoint')->nullable();
            $table->integer('wind_direction')->nullable();
            $table->integer('wind_speed')->nullable();
            $table->integer('wind_gust')->nullable();
            $table->boolean('wind_variable')->nullable();
            $table->boolean('wind_calm')->nullable();
            $table->float('visibility')->nullable();
            $table->integer('barometer')->nullable();
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
        Schema::dropIfExists('metars');
    }
}
