<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('overview')->nullable();
            $table->longText('address')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->longText('map')->nullable();
            $table->string('interview_period', 255)->nullable();
            $table->decimal('total_expense', 15, 2)->nullable();
            $table->integer('visa_type')->nullable();
            $table->string('language_level', 255)->nullable();
            $table->string('leaving_period', 255)->nullable();
            $table->integer('workers_sent')->nullable();
            $table->string('banner_titile', 255)->nullable();
            $table->longText('banner_text')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();

            $table->unique('email', 'agents_email_unique');


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
