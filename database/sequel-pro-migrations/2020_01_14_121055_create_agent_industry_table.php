<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAgentIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_industry', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('industry_id');



            $table->foreign('agent_id', 'agent_id_fk_698154')->references('id')->on('agents')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('industry_id', 'industry_id_fk_698155')->references('id')->on('industries')->onDelete('CASCADE
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
        Schema::dropIfExists('agent_industry');
    }
}
