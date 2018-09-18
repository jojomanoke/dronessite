<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
        });

        Schema::table('users', function(Blueprint $t){
            $t->integer('user_role')->nullable()->unsigned()->default('1');
            $t->foreign('user_role')->references('id')->on('user_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $t){
            $t->dropForeign('users_user_role_foreign');
        });
        Schema::dropIfExists('user_roles');
    }
}
