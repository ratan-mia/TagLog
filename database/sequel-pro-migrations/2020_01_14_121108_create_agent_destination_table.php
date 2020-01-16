<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAgentDestinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_destination', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('destination_id');

            $table->unique('destination_id', 'destination_id_fk_698160');
            $table->index('agent_id', 'agent_id_fk_698160');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_destination');
    }
}
