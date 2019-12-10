<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentIndustryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_industry', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');

            $table->foreign('agent_id', 'agent_id_fk_698153')->references('id')->on('agents')->onDelete('cascade');

            $table->unsignedInteger('industry_id');

            $table->foreign('industry_id', 'industry_id_fk_698153')->references('id')->on('industries')->onDelete('cascade');
        });
    }
}
