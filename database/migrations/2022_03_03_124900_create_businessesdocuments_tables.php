<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesDocumentsTables extends Migration
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

        Schema::create('businessesDocumentsTypes', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('observations');
            $table->tinyInteger('legal')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('businessesDocumentsDetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('businessDocument_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price',20,6);
            $table->timestamps();

            $table->foreign('businessDocument_id')->references('id')->on('businessesDocuments');
        });

        Schema::create('businessesDocumentsConfig', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('establishment_id');
            $table->unsignedSmallInteger('pos');
            $table->unsignedInteger('number',8);
            $table->string('description')->nullable()->default(null);
            $table->date('fiscalOpening');
            $table->date('fiscalClosing');
            $table->string('cai',14)->nullable()->default(null);
            $table->dateTime('caiExpirationDate');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('establishments');
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
        Schema::dropIfExists('businessesDocumentsTypes');
        Schema::dropIfExists('businessesDocumentsDetails');
    }
}