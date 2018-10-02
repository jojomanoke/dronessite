<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreFlightChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_flight_checklist', function(Blueprint $t){
            $t->increments('id');
            $t->boolean('airframe')->nullable();
            $t->boolean('flight_battery')->nullable();
            $t->boolean('transmitters')->nullable();
            $t->boolean('camera')->nullable();
            $t->boolean('airframe_calibration')->nullable();
            $t->boolean('flight_battery_props')->nullable();
            $t->boolean('self_diagnostic')->nullable();
            $t->boolean('monitor')->nullable();
            $t->boolean('calibration')->nullable();
            $t->boolean('save_calibration')->nullable();
            $t->boolean('camera_platform')->nullable();
            $t->boolean('telemetry_link')->nullable();
            $t->boolean('flight_plan')->nullable();
            $t->boolean('camera_recording')->nullable();
            $t->boolean('aircraft_alignment')->nullable();
            $t->boolean('crew_public_client')->nullable();
            $t->boolean('clearance')->nullable();
            $t->boolean('power_up')->nullable();
            $t->boolean('take_off')->nullable();
            $t->boolean('communication')->nullable();
            $t->boolean('landing')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('pre_flight_checklist')->nullable()->unsigned()->change();
            $t->foreign('pre_flight_checklist')->references('id')->on('pre_flight_checklist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
