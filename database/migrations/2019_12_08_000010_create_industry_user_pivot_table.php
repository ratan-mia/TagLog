<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('industry_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_698260')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('industry_id');

            $table->foreign('industry_id', 'industry_id_fk_698260')->references('id')->on('industries')->onDelete('cascade');
        });
    }
}
