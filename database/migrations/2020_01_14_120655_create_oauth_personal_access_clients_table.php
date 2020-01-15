<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateOauthPersonalAccessClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_personal_access_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->nullableTimestamps();

            $table->index('client_id', 'oauth_personal_access_clients_client_id_index');



        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_personal_access_clients');
    }
}
