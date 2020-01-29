<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentCountryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_country', function (Blueprint $table) {
            $table->unsignedInteger('agent_id');

            $table->foreign('agent_id', 'agent_id_fk_698152')->references('id')->on('agents')->onDelete('cascade');

            $table->unsignedInteger('country_id');

            $table->foreign('country_id', 'country_id_fk_698152')->references('id')->on('countries')->onDelete('cascade');
        });
    }
}
