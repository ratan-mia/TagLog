<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOauthAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_access_tokens', function (Blueprint $table) {
            $table->string('id', 100);
            $table->bigInteger('user_id')->nullable();
            $table->unsignedInteger('client_id');
            $table->string('name', 255)->nullable();
            $table->text('scopes')->nullable();
            $table->tinyInteger('revoked');
            $table->nullableTimestamps();
            $table->dateTime('expires_at')->nullable();

            $table->primary('id');
            $table->index('user_id', 'oauth_access_tokens_user_id_index');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_access_tokens');
    }
}
