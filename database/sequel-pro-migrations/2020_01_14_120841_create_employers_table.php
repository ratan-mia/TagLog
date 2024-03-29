<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('email', 255);
            $table->string('phone', 255)->nullable();
            $table->longText('address')->nullable();
            $table->longText('description')->nullable();
            $table->integer('recruiting_workers')->nullable();
            $table->decimal('monthly_salary', 15, 2)->nullable();
            $table->integer('working_hours')->nullable();
            $table->integer('days_off')->nullable();
            $table->string('banner_titile', 255)->nullable();
            $table->longText('banner_text')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();

            $table->unique('email', 'employers_email_unique');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
