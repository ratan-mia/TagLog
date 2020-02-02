<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('address')->nullable();

            $table->longText('inquiry')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
