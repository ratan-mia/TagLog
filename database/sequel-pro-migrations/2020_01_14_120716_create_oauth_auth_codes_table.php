<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOauthAuthCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_auth_codes', function (Blueprint $table) {
            $table->string('id', 100);
            $table->bigInteger('user_id');
            $table->unsignedInteger('client_id');
            $table->text('scopes')->nullable();
            $table->tinyInteger('revoked');
            $table->dateTime('expires_at')->nullable();

            $table->primary('id');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_auth_codes');
    }
}
