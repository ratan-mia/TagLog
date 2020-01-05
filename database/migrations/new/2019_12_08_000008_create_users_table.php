<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('email')->nullable()->unique();

            $table->datetime('email_verified_at')->nullable();

            $table->string('password')->nullable();

            $table->string('remember_token')->nullable();

            $table->string('city')->nullable();
            $table->string('destination_area')->nullable();

            $table->date('date_of_birth')->nullable();

            $table->string('gender')->nullable();

            $table->string('education_level')->nullable();
            $table->string('education_background')->nullable();
            $table->string('language_level')->nullable();

            $table->string('phone')->nullable();

            $table->string('facebook')->nullable();

            $table->string('skype')->nullable();

            $table->string('visa_type')->nullable();

            $table->decimal('expected_salary', 15, 2)->nullable();

            $table->date('date_of_leaving')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
