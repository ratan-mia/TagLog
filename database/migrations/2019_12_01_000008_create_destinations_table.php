<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->integer('country_id')->nullable();
            $table->string('language')->nullable();

            $table->string('currency')->nullable();

            $table->string('address')->nullable();

            $table->string('industries')->nullable();

            $table->string('employers')->nullable();

            $table->string('agents')->nullable();

            $table->decimal('hourly_salary', 15, 2)->nullable();

            $table->decimal('monthly_salary', 15, 2)->nullable();

            $table->string('yearly_salary')->nullable();

            $table->string('safe_medicine')->nullable();

            $table->longText('healthcare')->nullable();

            $table->string('taxi_available')->nullable();

            $table->longText('safety')->nullable();

            $table->longText('culture')->nullable();

            $table->longText('politics')->nullable();

            $table->longText('insurance')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
