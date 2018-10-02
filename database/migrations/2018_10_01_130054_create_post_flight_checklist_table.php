<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostFlightChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_flight_checklist', function (Blueprint $t) {
            $t->increments('id');
            $t->boolean('touchdown')->nullable();
            $t->boolean('power_down')->nullable();
            $t->boolean('removal')->nullable();
            $t->boolean('data_recording')->nullable();
            $t->boolean('transmitter')->nullable();
            $t->boolean('camera')->nullable();
            $t->boolean('airframe')->nullable();
            $t->boolean('battery')->nullable();
            $t->boolean('memory_card')->nullable();
            $t->boolean('review')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('post_flight_checklist')->unsigned()->nullable()->change();
            $t->foreign('post_flight_checklist')->references('id')->on('post_flight_checklist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_flight_checklist');
    }
}
