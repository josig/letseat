<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesDocumentsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessesDocumentsDetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_businessDocument');
            $table->unsignedInteger('quantity');
            $table->decimal('price',20,6);
            $table->timestamps();

            //$table->foreign('id_businessDocument')->references('id')->on('businessesDocumentsDetails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessesDocumentsDetails');
    }
}
