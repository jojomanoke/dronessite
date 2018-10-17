<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_log', function (Blueprint $t) {
            $t->increments('id');
            $t->date('date_of_incident')->nullable();
            $t->time('time_of_incident')->nullable();
            $t->string('damage')->nullable();
            $t->string('incident_details')->nullable();
            $t->string('action_taken')->nullable();
            $t->string('notes')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('incident_log')->unsigned()->nullable()->change();
            $t->foreign('incident_log')->references('id')->on('incident_log');
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
            $t->dropForeign('submitted_forms_incident_log_foreign');
        });
        Schema::dropIfExists('incident_log');
    }
}
