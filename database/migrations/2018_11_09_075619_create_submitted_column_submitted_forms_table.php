<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmittedColumnSubmittedFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operational_flight_plan', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('pre_site_survey', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('pre_flight_checklist', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('on_site_survey', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('maintenance_log', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('incident_log', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('embarkation_checklist', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('aircraft_pilot_and_crew_flight_logs', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('arrival_flight_checklist', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('post_flight_checklist', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });

        Schema::table('battery_log', function(Blueprint $t){
            $t->boolean('submitted')->default('0');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitted_column_submitted_forms');
    }
}
