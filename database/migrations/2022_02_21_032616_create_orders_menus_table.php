<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_menu');
            $table->timestamps();

            $table->foreign('id_order')->references('id')->on('orders')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('id_menu')->references('id')->on('menus')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_menus');
    }
}
