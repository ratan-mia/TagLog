<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->longText('address')->nullable();
            $table->string('philosophy_title', 255)->nullable();
            $table->longText('philosophy_sentence')->nullable();
            $table->string('business_title', 255)->nullable();
            $table->string('business_sentence', 255)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
