<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('countries_without_visa', 255)->nullable();
            $table->integer('duration')->nullable();
            $table->string('work_permit', 255)->nullable();
            $table->integer('working_limit')->nullable();
            $table->string('industries', 255)->nullable();
            $table->string('language_traning', 255)->nullable();
            $table->integer('training_duration')->nullable();
            $table->string('countries_restrictred', 255)->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();





        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visas');
    }
}
