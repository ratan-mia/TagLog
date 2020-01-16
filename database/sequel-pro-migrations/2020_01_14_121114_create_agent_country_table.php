<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAgentCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_country', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('country_id');



            $table->foreign('agent_id', 'agent_id_fk_698152')->references('id')->on('agents')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('country_id', 'country_id_fk_698153')->references('id')->on('countries')->onDelete('CASCADE
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
        Schema::dropIfExists('agent_country');
    }
}
