<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('email')->nullable();

            $table->string('phone')->nullable();

            $table->string('url')->nullable();

            $table->longText('address')->nullable();

            $table->string('philosophy_title')->nullable();

            $table->longText('philosophy_sentence')->nullable();

            $table->string('business_title')->nullable();

            $table->string('business_sentence')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
