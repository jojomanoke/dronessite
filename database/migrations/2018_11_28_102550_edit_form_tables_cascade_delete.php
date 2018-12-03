<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFormTablesCascadeDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submitted_forms', function (Blueprint $t) {
            $t->integer('operational_flight_plan')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('pre_site_survey')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('pre_flight_checklist')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('on_site_survey')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('maintenance_log')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('incident_log')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('embarkation_checklist')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('aircraft_pilot_and_crew_flight_logs')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('arrival_flight_checklist')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('post_flight_checklist')->unsigned()->nullable()->onDelete('cascade')->change();
            $t->integer('battery_log')->unsigned()->nullable()->onDelete('cascade')->change();
        });


        Schema::table('submitted_forms', function(Blueprint $t){
            $t->dropForeign('submitted_forms_operational_flight_plan_foreign');
            $t->dropForeign('submitted_forms_pre_site_survey_foreign');
            $t->dropForeign('submitted_forms_pre_flight_checklist_foreign');
            $t->dropForeign('submitted_forms_on_site_survey_foreign');
            $t->dropForeign('submitted_forms_maintenance_log_foreign');
            $t->dropForeign('submitted_forms_incident_log_foreign');
            $t->dropForeign('submitted_forms_embarkation_checklist_foreign');
            $t->dropForeign('submitted_forms_aircraft_pilot_and_crew_flight_logs_foreign');
            $t->dropForeign('submitted_forms_arrival_flight_checklist_foreign');
            $t->dropForeign('submitted_forms_post_flight_checklist_foreign');
            $t->dropForeign('submitted_forms_battery_log_foreign');
        });

        Schema::table('submitted_forms',function(Blueprint $t){
            $t->foreign('operational_flight_plan')->references('id')->on('operational_flight_plan')->onDelete('cascade');
            $t->foreign('pre_site_survey')->references('id')->on('pre_site_survey')->onDelete('cascade');
            $t->foreign('pre_flight_checklist')->references('id')->on('pre_flight_checklist')->onDelete('cascade');
            $t->foreign('on_site_survey')->references('id')->on('on_site_survey')->onDelete('cascade');
            $t->foreign('maintenance_log')->references('id')->on('maintenance_log')->onDelete('cascade');
            $t->foreign('incident_log')->references('id')->on('incident_log')->onDelete('cascade');
            $t->foreign('embarkation_checklist')->references('id')->on('embarkation_checklist')->onDelete('cascade');
            $t->foreign('aircraft_pilot_and_crew_flight_logs')->references('id')->on('aircraft_pilot_and_crew_flight_logs')->onDelete('cascade');
            $t->foreign('arrival_flight_checklist')->references('id')->on('arrival_flight_checklist')->onDelete('cascade');
            $t->foreign('post_flight_checklist')->references('id')->on('post_flight_checklist')->onDelete('cascade');
            $t->foreign('battery_log')->references('id')->on('battery_log')->onDelete('cascade');
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
