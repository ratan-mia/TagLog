<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerIndustryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('employer_industry', function (Blueprint $table) {
            $table->unsignedInteger('employer_id');

            $table->foreign('employer_id', 'employer_id_fk_698173')->references('id')->on('employers')->onDelete('cascade');

            $table->unsignedInteger('industry_id');

            $table->foreign('industry_id', 'industry_id_fk_698173')->references('id')->on('industries')->onDelete('cascade');
        });
    }
}
