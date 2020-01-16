<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->integer('country_id')->nullable();
            $table->string('language', 255)->nullable();
            $table->string('currency', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('industries', 255)->nullable();
            $table->string('employers', 255)->nullable();
            $table->string('agents', 255)->nullable();
            $table->decimal('hourly_salary', 15, 2)->nullable();
            $table->decimal('monthly_salary', 15, 2)->nullable();
            $table->string('yearly_salary', 255)->nullable();
            $table->string('safe_medicine', 255)->nullable();
            $table->longText('healthcare')->nullable();
            $table->string('taxi_available', 255)->nullable();
            $table->longText('safety')->nullable();
            $table->longText('culture')->nullable();
            $table->longText('politics')->nullable();
            $table->longText('insurance')->nullable();
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
        Schema::dropIfExists('destinations');
    }
}
