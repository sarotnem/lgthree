<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetarCloudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metar_clouds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metar_id')->unsigned();
            $table->string('cover');
            $table->string('base');
            $table->timestamps();

            $table->foreign('metar_id')->references('id')->on('metars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metar_clouds');
    }
}
