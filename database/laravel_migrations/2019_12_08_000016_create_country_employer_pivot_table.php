<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryEmployerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('country_employer', function (Blueprint $table) {
            $table->unsignedInteger('employer_id');

            $table->foreign('employer_id', 'employer_id_fk_698171')->references('id')->on('employers')->onDelete('cascade');

            $table->unsignedInteger('country_id');

            $table->foreign('country_id', 'country_id_fk_698171')->references('id')->on('countries')->onDelete('cascade');
        });
    }
}
