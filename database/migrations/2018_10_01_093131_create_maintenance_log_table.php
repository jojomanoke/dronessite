<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_log', function (Blueprint $t) {
            $t->increments('id');
            $t->dateTime('date')->nullable();
            $t->string('reason')->nullable();
            $t->string('work_done')->nullable();
            $t->string('parts_replaced')->nullable();
            $t->boolean('system_tested')->nullable();
            $t->string('notes')->nullable();
        });

        Schema::table('submitted_forms', function(Blueprint $t){
            $t->integer('maintenance_log')->nullable()->unsigned()->change();
            $t->foreign('maintenance_log')->references('id')->on('maintenance_log');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_log');
    }
}
