<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateEmployerIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_industry', function (Blueprint $table) {
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger('industry_id');



            $table->foreign('employer_id', 'employer_id_fk_698173')->references('id')->on('employers')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('industry_id', 'industry_id_fk_698173')->references('id')->on('industries')->onDelete('CASCADE
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
        Schema::dropIfExists('employer_industry');
    }
}
