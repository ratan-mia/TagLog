<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');

            $table->string('visa_type')->nullable();

            $table->string('industry')->nullable();

            $table->string('agent')->nullable();

            $table->string('employer')->nullable();

            $table->datetime('interview_date');

            $table->date('start_date')->nullable();

            $table->string('result')->nullable();

            $table->longText('contact_to_taglog')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
