<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCapabilityRoleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capability_role', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('capability_id')->unsigned()->index();
            //$table->foreign('capability_id')->references('id')->on('capabilities')->onDelete('cascade');
            $table->integer('role_id')->unsigned()->index();
            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('capability_role');
    }

}
