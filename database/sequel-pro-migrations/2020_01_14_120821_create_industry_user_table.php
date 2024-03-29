<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateIndustryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('industry_id');



            $table->foreign('industry_id', 'industry_id_fk_698260')->references('id')->on('industries')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('user_id', 'user_id_fk_698260')->references('id')->on('users-old')->onDelete('CASCADE
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
        Schema::dropIfExists('industry_user');
    }
}
