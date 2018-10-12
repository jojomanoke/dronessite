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
            $t->date('date')->nullable();
            $t->time('take_off_time')->nullable();
            $t->time('landing_time')->nullable();
            $t->integer('duration')->nullable();
            $t->string('aircraft')->nullable();
            $t->string('aircraft_system')->nullable();
            $t->string('engine_battery_no')->nullable();
            $t->string('pilot_in_command')->nullable();
            $t->string('observer')->nullable();
            $t->string('payload_operator')->nullable();
            $t->string('location')->nullable();
            $t->string('purpose_of_flight')->nullable();
            $t->string('comments')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('aircraft_pilot_and_crew_flight_logs')->nullable()->unsigned()->change();
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
        Schema::table('submitted_forms', function(Blueprint $t){
            $t->dropForeign('submitted_forms_aircraft_pilot_and_crew_flight_logs_foreign');
        });
        Schema::dropIfExists('aircraft_pilot_and_crew_flight_logs');
    }
}
