<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAgentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_user', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('user_id');



            $table->foreign('agent_id', 'agent_id_fk_698207')->references('id')->on('agents')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('user_id', 'user_id_fk_698207')->references('id')->on('users-old')->onDelete('CASCADE
')->onUpdate('RESTRICT');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_user');
    }
}
