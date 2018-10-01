<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAircraftPilotAndCrewFlightLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft_pilot_and_crew_flight_logs', function (Blueprint $t) {
            $t->increments('id');
            $t->date('date')->unsigned();
            $t->time('take_off_time')->unsigned();
            $t->time('landing_time')->unsigned();
            $t->integer('duration')->unsigned();
            $t->string('aircraft')->unsigned();
            $t->string('aircraft_system')->unsigned();
            $t->string('engine_battery_no')->unsigned();
            $t->string('pilot_in_command')->unsigned();
            $t->string('observer')->unsigned();
            $t->string('payload_operator')->unsigned();
            $t->string('location')->unsigned();
            $t->string('purpose_of_flight')->unsigned();
            $t->string('comments')->unsigned();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('aircraft_pilot_and_crew_flight_logs')->unsigned()->nullable()->change();
            $t->foreign('aircraft_pilot_and_crew_flight_logs')->references('id')->on('aircraft_pilot_and_crew_flight_logs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aircraft_pilot_and_crew_flight_logs');
    }
}
