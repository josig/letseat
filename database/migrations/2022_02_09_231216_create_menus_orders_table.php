<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_orders', function (Blueprint $table) {
            $table->unsignedSmallInteger('menu_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_orders');
    }
}
