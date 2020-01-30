<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('position')->nullable();

            $table->longText('overview')->nullable();

            $table->string('facebook')->nullable();

            $table->string('twitter')->nullable();

            $table->string('instagram')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
