<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('type')->nullable();

            $table->string('countries_without_visa')->nullable();

            $table->integer('duration')->nullable();

            $table->string('work_permit')->nullable();

            $table->integer('working_limit')->nullable();

            $table->string('industries')->nullable();

            $table->string('language_traning')->nullable();

            $table->integer('training_duration')->nullable();

            $table->string('countries_restrictred')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
