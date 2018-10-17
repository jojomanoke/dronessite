<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatteryLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery_log', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('battery_number')->nullable();
            $t->string('battery_residual')->nullable();
            $t->date('date_of_charge')->nullable();
            $t->string('charge_input')->nullable();
            $t->integer('flight_duration')->nullable();
            $t->string('pre_flight')->nullable();
            $t->string('notes')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('battery_log')->nullable()->unsigned()->change();
            $t->foreign('battery_log')->references('id')->on('battery_log');
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
            $t->dropForeign('submitted_forms_battery_log_foreign');
        });
        Schema::dropIfExists('battery_log');
    }
}
