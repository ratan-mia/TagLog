<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExperiencesTable extends Migration
{
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id', 'user_fk_698289')->references('id')->on('users');

            $table->unsignedInteger('agent_id')->nullable();

            $table->foreign('agent_id', 'agent_fk_698290')->references('id')->on('agents');

            $table->unsignedInteger('destination_country_id')->nullable();

            $table->foreign('destination_country_id', 'destination_country_fk_698291')->references('id')->on('countries');

            $table->unsignedInteger('employer_id')->nullable();

            $table->foreign('employer_id', 'employer_fk_698298')->references('id')->on('employers');

            $table->unsignedInteger('industry_id')->nullable();

            $table->foreign('industry_id', 'industry_fk_698299')->references('id')->on('industries');
        });
    }
}
