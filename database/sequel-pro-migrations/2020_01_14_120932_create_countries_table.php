<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('short_code', 255);
            $table->string('language', 255)->nullable();
            $table->string('currency', 255)->nullable();
            $table->longText('religion')->nullable();
            $table->longText('description')->nullable();
            $table->string('safe_food', 255)->nullable();
            $table->longText('food')->nullable();
            $table->string('safe_medicine', 255)->nullable();
            $table->longText('health_insurance')->nullable();
            $table->longText('healthcare')->nullable();
            $table->string('taxi_available', 255)->nullable();
            $table->longText('transport')->nullable();
            $table->longText('culture')->nullable();
            $table->longText('politics')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
