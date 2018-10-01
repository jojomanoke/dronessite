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
            $t->boolean('ground_station_and_leads')->unsigned();
            $t->boolean('camera_monitor_and_leads')->unsigned();
            $t->boolean('av_receiver_and_leads')->unsigned();
            $t->boolean('telemetry_receiver_and_leads')->unsigned();
            $t->boolean('laptop_and_leads')->unsigned();
            $t->boolean('mobile_phone_and_emergency_nos')->unsigned();
            $t->boolean('anemometer')->unsigned();
            $t->boolean('first_aids_kit_and_fire_extinguisher')->unsigned();
            $t->boolean('crew_identification')->unsigned();
            $t->boolean('fluorescent_jackets_hard_hats')->unsigned();
            $t->boolean('two_way_radios')->unsigned();
            $t->boolean('clothing')->unsigned();
            $t->boolean('air_navigation_map')->unsigned();
            $t->boolean('checklists_manuals_and_logbooks')->unsigned();
            $t->boolean('notepad_and_pens')->unsigned();
            $t->boolean('site_assessment_form')->unsigned();
            $t->boolean('sites_safety_tape_cones')->unsigned();
            $t->boolean('flight_battery_packs')->unsigned();
            $t->boolean('transmitter_battery_packs')->unsigned();
            $t->boolean('camera_battery_packs')->unsigned();
            $t->boolean('ground_station_battery')->unsigned();
            $t->boolean('charger_battery_packs')->unsigned();
            $t->boolean('mobile_phone_battery')->unsigned();
            $t->boolean('airframe')->unsigned();
            $t->boolean('camera_mount')->unsigned();
            $t->boolean('flight_controller_transmitters')->unsigned();
            $t->boolean('calibration_platform')->unsigned();
            $t->boolean('cameras_and_lenses')->unsigned();
            $t->boolean('camera_connection_leads')->unsigned();
            $t->boolean('camera_memory_cards')->unsigned();
            $t->boolean('camera_to_airframe_lanyard')->unsigned();
            $t->boolean('camera_attachment_bolt')->unsigned();
            $t->boolean('multi_function_battery_charger')->unsigned();
            $t->boolean('required_charger_leads')->unsigned();
            $t->boolean('battery_checker')->unsigned();
            $t->boolean('screwdrivers')->unsigned();
            $t->boolean('allen_keys')->unsigned();
            $t->boolean('pliers')->unsigned();
            $t->boolean('cable_ties')->unsigned();
            $t->boolean('side_cutters')->unsigned();
            $t->boolean('nylock_propeller_nuts')->unsigned();
            $t->boolean('spare_props')->unsigned();
            $t->boolean('small_socket_set')->unsigned();
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
