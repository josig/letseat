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
            $table->smallIncrements('id');
            $table->unsignedInteger('businessDocumentDetail_id');
            $table->unsignedTinyInteger('businessDocumentType_id');
            $table->unsignedInteger('number')->default();
            $table->decimal('amount',20,6);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('businessDocumentDetail_id')->references('id')->on('businessesDocumentsDetails');
            $table->foreign('businessDocumentType_id')->references('id')->on('businessesDocumentsTypes');
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