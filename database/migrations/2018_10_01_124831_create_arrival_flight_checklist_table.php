<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrivalFlightChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrival_flight_checklist', function (Blueprint $t) {
            $t->increments('id');
            $t->boolean('site_survey')->nullable();
            $t->boolean('flight_plan')->nullable();
            $t->boolean('airframe')->nullable();
            $t->boolean('camera')->nullable();
            $t->boolean('av_connections')->nullable();
            $t->boolean('propellors')->nullable();
            $t->boolean('calibration_platform')->nullable();
            $t->boolean('ground_station')->nullable();
            $t->boolean('av_monitor')->nullable();
            $t->boolean('crew_identification_badges')->nullable();
            $t->boolean('hard_hat_fluorescent_jackets')->nullable();
            $t->boolean('two_way_radios')->nullable();
            $t->boolean('first_aid_kit')->nullable();
            $t->boolean('fire_extinguisher')->nullable();
            $t->boolean('cordens_signs_and_safety_tape')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('arrival_flight_checklist')->unsigned()->nullable()->change();
            $t->foreign('arrival_flight_checklist')->references('id')->on('arrival_flight_checklist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrival_flight_checklist');
    }
}
