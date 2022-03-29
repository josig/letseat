<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_product');
            $table->timestamps();

            $table->foreign('id_menu')->references('id')->on('menus')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('id_product')->references('id')->on('products')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_products');
    }
}
