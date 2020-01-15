<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');



            $table->foreign('role_id', 'role_id_fk_698017')->references('id')->on('roles')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign('user_id', 'user_id_fk_698017')->references('id')->on('users-old')->onDelete('CASCADE
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
        Schema::dropIfExists('role_user');
    }
}
