<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentEmployerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_employer', function (Blueprint $table) {
            $table->unsignedInteger('employer_id');

            $table->foreign('employer_id', 'employer_id_fk_698172')->references('id')->on('employers')->onDelete('cascade');

            $table->unsignedInteger('agent_id');

            $table->foreign('agent_id', 'agent_id_fk_698172')->references('id')->on('agents')->onDelete('cascade');
        });
    }
}
