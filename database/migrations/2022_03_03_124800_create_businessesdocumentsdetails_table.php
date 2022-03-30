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
            $table->unsignedBigInteger('businessDocument_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price',20,6);
            $table->timestamps();

            $table->foreign('businessDocument_id')->references('id')->on('businessesDocuments');
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
