<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestinationEmployer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_employer', function (Blueprint $table) {
            $table->integer('destination_id');
            $table->integer('employer_id');
            $table->foreign('destination_id','destination_fk_172012')->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employer_id','employer_fk_172012')->references('id')->on('employers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destination_employer', function (Blueprint $table) {
            //
        });
    }
}
