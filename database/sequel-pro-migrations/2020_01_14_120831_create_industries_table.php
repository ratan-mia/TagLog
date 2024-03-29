<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->longText('description')->nullable();
            $table->decimal('minimum_salary', 15, 2)->nullable();
            $table->decimal('maximum_salary', 15, 2)->nullable();
            $table->string('education_level', 255)->nullable();
            $table->string('training_level', 255)->nullable();
            $table->string('language_course', 255)->nullable();
            $table->string('language_course_level', 255)->nullable();
            $table->string('banner_titile', 255)->nullable();
            $table->longText('banner_text')->nullable();
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
        Schema::dropIfExists('industries');
    }
}
