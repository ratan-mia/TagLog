<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriesTable extends Migration
{
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->longText('description')->nullable();

            $table->decimal('minimum_salary', 15, 2)->nullable();

            $table->decimal('maximum_salary', 15, 2)->nullable();

            $table->string('education_level')->nullable();

            $table->string('training_level')->nullable();

            $table->string('language_course')->nullable();

            $table->string('language_course_level')->nullable();

            $table->string('banner_titile')->nullable();

            $table->longText('banner_text')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
