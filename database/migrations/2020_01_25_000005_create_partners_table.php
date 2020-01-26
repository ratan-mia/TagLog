<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');

            $table->string('country');

            $table->string('company');

            $table->longText('address')->nullable();

            $table->longText('details')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
