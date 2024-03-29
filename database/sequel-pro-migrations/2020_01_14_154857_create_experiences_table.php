<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('visa_type', 255)->nullable();
            $table->string('application_period', 255)->nullable();
            $table->string('language_level', 255)->nullable();
            $table->unsignedInteger('industry_id')->nullable();
            $table->unsignedInteger('agent_id')->nullable();
            $table->integer('agent_rating')->nullable();
            $table->longText('agent_feedback')->nullable();
            $table->string('expenses_paid', 255)->nullable();
            $table->integer('visa_application_rating')->nullable();
            $table->integer('language_training_rating')->nullable();
            $table->unsignedInteger('destination_id')->nullable();
            $table->date('emloyment_date')->nullable();
            $table->integer('employment_period')->nullable();
            $table->decimal('monthly_salary', 15, 2)->nullable();
            $table->decimal('monthly_living_expenses', 15, 2)->nullable();
            $table->string('accommodation_type', 255)->nullable();
            $table->string('weekly_working_hours', 255)->nullable();
            $table->integer('monthly_days_off')->nullable();
            $table->string('next_year_opportunity', 255)->nullable();
            $table->unsignedInteger('employer_id')->nullable();
            $table->text('employer_location')->nullable();
            $table->integer('employer_rating')->nullable();
            $table->longText('employer_feedback')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();


            $table->foreign('user_id', 'user_fk_698289')->references('id')->on('users')->onDelete('RESTRICT
')->onUpdate('RESTRICT');
            $table->foreign('agent_id', 'agent_fk_698290')->references('id')->on('agents')->onDelete('RESTRICT
')->onUpdate('RESTRICT');
            $table->foreign('destination_id', 'destination_fk_698291')->references('id')->on('countries')->onDelete('RESTRICT
')->onUpdate('RESTRICT');
            $table->foreign('employer_id', 'employer_fk_698298')->references('id')->on('employers')->onDelete('RESTRICT
')->onUpdate('RESTRICT');
            $table->foreign('industry_id', 'industry_fk_698299')->references('id')->on('industries')->onDelete('RESTRICT
')->onUpdate('RESTRICT');


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
