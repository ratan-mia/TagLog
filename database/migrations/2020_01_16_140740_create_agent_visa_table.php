<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentVisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_visa', function (Blueprint $table) {
            $table->integer('agent_id')->unsigned();
            $table->integer('visa_id')->unsigned();

            $table->foreign('agent_id','agent_fk_134723')->references('id')->on('agents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('visa_id','visa_fk_134724')->references('id')->on('visas')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_visa', function (Blueprint $table) {
            //
        });
    }
}
