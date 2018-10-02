<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnSiteSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_site_survey', function (Blueprint $t) {
            $t->increments('id');
            $t->string('pilot_in_command')->nullable();
            $t->string('observer')->nullable();
            $t->string('obstructions')->nullable();
            $t->string('view_limitations')->nullable();
            $t->string('people')->nullable();
            $t->string('livestock')->nullable();
            $t->string('temperature')->nullable();
            $t->string('visibility')->nullable();
            $t->string('surface')->nullable();
            $t->string('permission')->nullable();
            $t->string('public')->nullable();
            $t->string('air_traffic')->nullable();
            $t->string('communication')->nullable();
            $t->string('proximity')->nullable();
            $t->string('take_off_area')->nullable();
            $t->string('landing_area')->nullable();
            $t->string('operational_zone')->nullable();
            $t->string('emergency_area')->nullable();
            $t->string('holding_area')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('on_site_survey')->nullable()->unsigned()->change();
            $t->foreign('on_site_survey')->references('id')->on('on_site_survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_site_survey');
    }
}
