<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type', 255);
            $table->unsignedBigInteger('model_id');
            $table->string('collection_name', 255);
            $table->string('name', 255);
            $table->string('file_name', 255);
            $table->string('mime_type', 255)->nullable();
            $table->string('disk', 255);
            $table->unsignedInteger('size');
            $table->json('manipulations');
            $table->json('custom_properties');
            $table->json('responsive_images');
            $table->unsignedInteger('order_column')->nullable();
            $table->nullableTimestamps();

            $table->index(['model_type', 'model_id'], 'media_model_type_model_id_index');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
