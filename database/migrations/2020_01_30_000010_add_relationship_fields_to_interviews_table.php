<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInterviewsTable extends Migration
{
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id', 'user_fk_941327')->references('id')->on('users');
        });
    }
}
