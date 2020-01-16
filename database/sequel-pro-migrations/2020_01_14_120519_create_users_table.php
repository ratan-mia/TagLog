<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_status', 255)->nullable();
            $table->string('visa_type', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('remember_token', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('skype', 255)->nullable();
            $table->string('education_level', 255)->nullable();
            $table->string('education_background', 255)->nullable();
            $table->string('language_level', 255)->nullable();
            $table->unsignedInteger('nationality_id')->nullable();
            $table->string('city', 255)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('destination_area', 255)->nullable();
            $table->unsignedInteger('destination_country_id')->nullable();
            $table->unsignedInteger('agents_id')->nullable();
            $table->unsignedInteger('indurstry_id')->nullable();
            $table->unsignedInteger('employer_id')->nullable();
            $table->decimal('expected_salary', 15, 2)->nullable();
            $table->date('date_of_leaving')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();

            $table->unique('email', 'users_email_unique');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
