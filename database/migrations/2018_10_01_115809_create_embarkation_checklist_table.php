<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmbarkationChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarkation_checklist', function (Blueprint $t) {
            $t->increments('id');
            $t->boolean('ground_station_and_leads')->nullable();
            $t->boolean('camera_monitor_and_leads')->nullable();
            $t->boolean('av_receiver_and_leads')->nullable();
            $t->boolean('telemetry_receiver_and_leads')->nullable();
            $t->boolean('laptop_and_leads')->nullable();
            $t->boolean('mobile_phone_and_emergency_nos')->nullable();
            $t->boolean('anemometer')->nullable();
            $t->boolean('first_aids_kit_and_fire_extinguisher')->nullable();
            $t->boolean('crew_identification')->nullable();
            $t->boolean('fluorescent_jackets_hard_hats')->nullable();
            $t->boolean('two_way_radios')->nullable();
            $t->boolean('clothing')->nullable();
            $t->boolean('air_navigation_map')->nullable();
            $t->boolean('checklists_manuals_and_logbooks')->nullable();
            $t->boolean('notepad_and_pens')->nullable();
            $t->boolean('site_assessment_form')->nullable();
            $t->boolean('sites_safety_tape_cones')->nullable();
            $t->boolean('flight_battery_packs')->nullable();
            $t->boolean('transmitter_battery_packs')->nullable();
            $t->boolean('camera_battery_packs')->nullable();
            $t->boolean('ground_station_battery')->nullable();
            $t->boolean('charger_battery_packs')->nullable();
            $t->boolean('mobile_phone_battery')->nullable();
            $t->boolean('airframe')->nullable();
            $t->boolean('camera_mount')->nullable();
            $t->boolean('flight_controller_transmitters')->nullable();
            $t->boolean('calibration_platform')->nullable();
            $t->boolean('cameras_and_lenses')->nullable();
            $t->boolean('camera_connection_leads')->nullable();
            $t->boolean('camera_memory_cards')->nullable();
            $t->boolean('camera_to_airframe_lanyard')->nullable();
            $t->boolean('camera_attachment_bolt')->nullable();
            $t->boolean('multi_function_battery_charger')->nullable();
            $t->boolean('required_charger_leads')->nullable();
            $t->boolean('battery_checker')->nullable();
            $t->boolean('screwdrivers')->nullable();
            $t->boolean('allen_keys')->nullable();
            $t->boolean('pliers')->nullable();
            $t->boolean('cable_ties')->nullable();
            $t->boolean('side_cutters')->nullable();
            $t->boolean('nylock_propeller_nuts')->nullable();
            $t->boolean('spare_props')->nullable();
            $t->boolean('small_socket_set')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('embarkation_checklist')->unsigned()->nullable()->change();
            $t->foreign('embarkation_checklist')->references('id')->on('embarkation_checklist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('embarkation_checklist');
    }
}
