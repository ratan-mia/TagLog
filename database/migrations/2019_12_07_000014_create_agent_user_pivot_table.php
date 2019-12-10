<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_user', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');

            $table->foreign('agent_id', 'agent_id_fk_698207')->references('id')->on('agents')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_698207')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
