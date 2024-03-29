<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_type', 255);
            $table->unsignedBigInteger('location_id');
            $table->string('address', 255);
            $table->string('latitude', 255);
            $table->string('longitude', 255);
            $table->nullableTimestamps();

            $table->index(['location_type', 'location_id'], 'locations_location_type_location_id_index');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
