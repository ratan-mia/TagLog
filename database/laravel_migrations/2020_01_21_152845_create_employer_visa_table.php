<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerVisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_visa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id');
            $table->integer('visa_id');
            $table->foreign('employer_id')->references('id')->on('employers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('visa_id')->references('id')->on('visas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employer_visa', function (Blueprint $table) {
            //
        });
    }
}
