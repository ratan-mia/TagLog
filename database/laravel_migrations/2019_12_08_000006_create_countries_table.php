<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('short_code');

            $table->string('language')->nullable();

            $table->string('currency')->nullable();

            $table->longText('religion')->nullable();

            $table->longText('description')->nullable();

            $table->string('safe_food')->nullable();

            $table->longText('food')->nullable();

            $table->string('safe_medicine')->nullable();

            $table->longText('health_insurance')->nullable();

            $table->longText('healthcare')->nullable();

            $table->string('taxi_available')->nullable();

            $table->longText('transport')->nullable();

            $table->longText('culture')->nullable();

            $table->longText('politics')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
