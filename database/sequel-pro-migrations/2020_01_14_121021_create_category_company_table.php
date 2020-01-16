<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCategoryCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_company', function (Blueprint $table) {
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('category_id');



            $table->foreign(['category_id', 'category_id', 'category_id', 'category_id', 'category_id'], 'category_id_fk_344255')->references(['id', 'id', 'id', 'id', 'id'])->on('categories')->onDelete('CASCADE
')->onUpdate('RESTRICT');
            $table->foreign(['company_id', 'company_id', 'company_id', 'company_id', 'company_id'], 'company_id_fk_344255')->references(['id', 'id', 'id', 'id', 'id'])->on('companies')->onDelete('CASCADE
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
        Schema::dropIfExists('category_company');
    }
}
