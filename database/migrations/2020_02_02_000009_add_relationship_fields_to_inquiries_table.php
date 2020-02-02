<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id', 'user_fk_953979')->references('id')->on('users');

            $table->unsignedInteger('country_id')->nullable();

            $table->foreign('country_id', 'country_fk_953981')->references('id')->on('countries');

            $table->unsignedInteger('agent_id')->nullable();

            $table->foreign('agent_id', 'agent_fk_953984')->references('id')->on('agents');
        });
    }
}
