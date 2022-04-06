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
            $table->unsignedSmallInteger('menu_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('no action');
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
