<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_productsCategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_productCategory');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_productCategory')->references('id')->on('productsCategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_productsCategories');
    }
}
