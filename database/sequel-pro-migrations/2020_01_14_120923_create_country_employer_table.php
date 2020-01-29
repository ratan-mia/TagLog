<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCountryEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_employer', function (Blueprint $table) {
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger('country_id');



            $table->foreign('country_id', 'country_id_fk_698171')->references('id')->on('countries')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('employer_id', 'employer_id_fk_698171')->references('id')->on('employers')->onDelete('CASCADE
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
        Schema::dropIfExists('country_employer');
    }
}
