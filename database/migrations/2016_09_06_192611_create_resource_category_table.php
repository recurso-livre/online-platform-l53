<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_categories', function (Blueprint $table) {
            $table->increments('id')->index();

            // ID e DECLARAÇÃO DA FOREIGN KEY resources_id
            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('resources');

            // ID e DECLARAÇÃO DA FOREIGN KEY categories_id
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources_categories');
    }
}
