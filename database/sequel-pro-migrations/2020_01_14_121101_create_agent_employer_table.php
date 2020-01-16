<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAgentEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_employer', function (Blueprint $table) {
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger('agent_id');



            $table->foreign('agent_id', 'agent_id_fk_698172')->references('id')->on('agents')
                ->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign('employer_id', 'employer_id_fk_698172')->references('id')->on('employers')
                ->onDelete('CASCADE')->onUpdate('RESTRICT');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_employer');
    }
}
