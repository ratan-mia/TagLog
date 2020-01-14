<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');

            $table->float('rating', 15, 2)->nullable();

            $table->string('comment_type');

            $table->longText('comment')->nullable();

            $table->string('commentable_type')->nullable();

            $table->string('commentable')->nullable();

            $table->integer('approved')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
