<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('country_id')->nullable();

            $table->foreign('country_id', 'country_fk_698250')->references('id')->on('countries');

            $table->unsignedInteger('nationality_id')->nullable();
            $table->foreign('nationality_id','nationality_fk_806925')->references('id')->on('nationalities');

            $table->unsignedInteger('destination_id')->nullable();

            $table->foreign('destination_id', 'destination_fk_698258')->references('id')->on('countries');

            $table->unsignedInteger('employer_id')->nullable();

            $table->foreign('employer_id', 'employer_fk_698263')->references('id')->on('employers');

            $table->unsignedInteger('agents_id')->nullable();

            $table->foreign('agents_id', 'agents_fk_698264')->references('id')->on('employers');

            $table->unsignedInteger('indurstry_id')->nullable();

            $table->foreign('indurstry_id', 'indurstry_fk_698265')->references('id')->on('industries');
        });
    }
}
