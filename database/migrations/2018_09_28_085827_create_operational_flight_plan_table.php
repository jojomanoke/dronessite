<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_flight_plan', function(Blueprint $t){
            $t->increments('id');
            $t->string('pilot_in_command')->nullable();
            $t->string('observer')->nullable();
            $t->string('payload_operator')->nullable();
            $t->string('helper_1')->nullable();
            $t->string('address')->nullable();
            $t->string('latitude_longitude')->nullable();
            $t->string('elevation')->nullable();
            $t->string('vehicular_access')->nullable();
            $t->string('purpose_of_the_flight')->nullable();
            $t->string('type_of_operator')->nullable();
            $t->dateTime('date_work_required')->nullable();
            $t->integer('mission_duration')->nullable()->unsigned();
            $t->integer('cruising_altitude')->nullable()->unsigned();
            $t->integer('maximum_altitude')->nullable()->unsigned();
            $t->integer('maximum_distance')->nullable()->unsigned();
            $t->string('satellite_picture')->nullable();
            $t->string('bag_viewer_picture')->nullable();
            $t->string('position_of_crew')->nullable();
            $t->string('flightbox')->nullable();
            $t->string('alternate_landing_sites')->nullable();
            $t->string('save_distance')->nullable();
            $t->string('risk_assessment')->nullable();
            $t->string('local_air_traffic_control')->nullable();
            $t->string('regional_air_traffic_control')->nullable();
            $t->string('military_control')->nullable();
            $t->string('low_flying_coordinator')->nullable();
            $t->string('airspace_level')->nullable();
            $t->string('civil_military_ctr')->nullable();
            $t->string('atc_required')->nullable();
            $t->string('within_3nm_military')->nullable();
            $t->string('prohibited_restricted_danger_zone')->nullable();
            $t->string('airmen_notice')->nullable();
            $t->string('notam_published')->nullable();
            $t->string('operation_helpdesk_consulted')->nullable();
            $t->string('weather_fvr')->nullable();
            $t->string('distance_industrial_ports')->nullable();
            $t->string('50m_horizontal_distance')->nullable();
            $t->string('class_1_flight')->nullable();
            $t->string('tug_received')->nullable();
            $t->string('flight_reported')->nullable();
            $t->string('terrain')->nullable();
            $t->string('other_aircraft')->nullable();
            $t->string('hazards')->nullable();
            $t->string('restrictions')->nullable();
            $t->string('sensitivities')->nullable();
            $t->string('permission')->nullable();
            $t->string('weather')->nullable();
        });

        Schema::table('submitted_forms',function(Blueprint $t){
            $t->integer('operational_flight_plan')->nullable()->unsigned()->change();
            $t->foreign('operational_flight_plan')->references('id')->on('operational_flight_plan');
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
