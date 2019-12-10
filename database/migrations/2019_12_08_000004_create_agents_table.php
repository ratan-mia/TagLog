<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->longText('address')->nullable();

            $table->string('email')->unique();

            $table->string('phone')->nullable();

            $table->longText('map')->nullable();

            $table->string('interview_period')->nullable();

            $table->decimal('total_expense', 15, 2)->nullable();

            $table->string('language_level')->nullable();

            $table->string('leaving_period')->nullable();

            $table->integer('workers_sent')->nullable();

            $table->string('banner_titile')->nullable();

            $table->longText('banner_text')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
