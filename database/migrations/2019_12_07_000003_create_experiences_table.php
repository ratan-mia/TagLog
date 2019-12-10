<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');

            $table->string('visa_type')->nullable();

            $table->string('application_period')->nullable();

            $table->string('expenses_paid')->nullable();

            $table->string('language_level')->nullable();

            $table->integer('agent_rating')->nullable();

            $table->date('emloyment_date')->nullable();

            $table->integer('employment_period')->nullable();

            $table->decimal('monthly_salary', 15, 2)->nullable();

            $table->decimal('monthly_living_expenses', 15, 2)->nullable();

            $table->string('accommodation_type')->nullable();

            $table->string('weekly_working_hours')->nullable();

            $table->longText('agent_feedback')->nullable();

            $table->integer('monthly_days_off')->nullable();

            $table->string('next_year_opportunity')->nullable();

            $table->integer('employer_rating')->nullable();

            $table->longText('employer_feedback')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
