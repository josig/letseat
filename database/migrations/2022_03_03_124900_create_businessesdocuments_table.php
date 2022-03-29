<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessesDocuments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_businessDocumentDetail');
            $table->unsignedBigInteger('id_businessDocumentType');
            $table->unsignedInteger('number')->default();
            $table->decimal('amount',20,6);
            $table->timestamps();

            $table->foreign('id_businessDocumentDetail')->references('id')->on('businessesDocumentsDetails');
            $table->foreign('id_businessDocumentType')->references('id')->on('businessesDocumentsTypes');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessesDocuments');
    }
}