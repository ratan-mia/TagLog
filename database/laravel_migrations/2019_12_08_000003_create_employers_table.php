<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('email')->unique();

            $table->string('phone')->nullable();

            $table->longText('address')->nullable();

            $table->longText('description')->nullable();

            $table->integer('recruiting_workers')->nullable();

            $table->decimal('monthly_salary', 15, 2)->nullable();

            $table->integer('working_hours')->nullable();

            $table->integer('days_off')->nullable();

            $table->string('banner_titile')->nullable();

            $table->longText('banner_text')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
