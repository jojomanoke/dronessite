<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmittedFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitted_forms', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id')->unsigned()->nullable();
            $t->foreign('user_id')->references('id')->on('users');
            $t->string('operational_flight_plan')->nullable();
            $t->string('pre_site_survey')->nullable();
            $t->string('pre_flight_checklist')->nullable();
            $t->string('on_site_survey')->nullable();
            $t->string('maintenance_log')->nullable();
            $t->string('incident_log')->nullable();
            $t->string('embarkation_checklist')->nullable();
            $t->string('aircraft_pilot_and_crew_flight_logs')->nullable();
            $t->string('arrival_flight_checklist')->nullable();
            $t->string('post_flight_checklist')->nullable();
            $t->string('battery_log')->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitted_forms');
    }
}
