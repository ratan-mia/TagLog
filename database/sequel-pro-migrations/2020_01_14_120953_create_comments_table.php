<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('rating', 15, 2)->nullable();
            $table->string('comment_type', 255);
            $table->longText('comment')->nullable();
            $table->string('commentable_type', 255)->nullable();
            $table->string('commentable', 255)->nullable();
            $table->integer('approved')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
