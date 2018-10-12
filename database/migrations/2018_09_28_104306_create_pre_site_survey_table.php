<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreSiteSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_site_survey', function(Blueprint $t){
            $t->increments('id');
            $t->string('pilot_in_command')->nullable();
            $t->string('observer')->nullable();
            $t->string('uav_registration')->nullable();
            $t->string('helper_1')->nullable();
            $t->string('helper_2')->nullable();
            $t->string('latitude_longitude')->nullable();
            $t->string('altitude_from_sea_level')->nullable();
            $t->string('work_required')->nullable();
            $t->dateTime('date_work_required')->nullable();
            $t->boolean('downloaded_map_to_groundstation')->nullable();
            $t->boolean('vehicular_access')->nullable();
            $t->string('airspace_type')->nullable();
            $t->string('terrain_type')->nullable();
            $t->string('proximities')->nullable();
            $t->string('hazards')->nullable();
            $t->string('restrictions')->nullable();
            $t->string('sensitivities')->nullable();
            $t->string('people')->nullable();
            $t->string('livestock')->nullable();
            $t->string('permission')->nullable();
            $t->string('access')->nullable();
            $t->string('footpaths')->nullable();
            $t->string('alternate')->nullable();
            $t->string('risk_reduction')->nullable();
            $t->string('weather')->nullable();
            $t->string('notams')->nullable();
            $t->string('local_air_traffic_control')->nullable();
            $t->string('regional_air_traffic_control')->nullable();
            $t->string('military_control')->nullable();
            $t->string('notice_to_airmen')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('pre_site_survey')->nullable()->unsigned()->change();
            $t->foreign('pre_site_survey')->references('id')->on('pre_site_survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void;
     */
    public function down()
    {
        Schema::dropIfExists('pre_site_survey');
    }
}
