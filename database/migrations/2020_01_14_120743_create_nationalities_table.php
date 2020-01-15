<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateNationalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 255);
            $table->string('country', 255);
            $table->string('name', 255);
            $table->nullableTimestamps();





        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationalities');
    }
}
