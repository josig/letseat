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
        Schema::create('businessesDocumentsTypes', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('description')->nullable()->default(null);
            $table->string('observations')->nullable()->default(null);
            $table->tinyInteger('legal')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('businessesDocumentsDetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('quantity');
            $table->decimal('price',20,6);
            $table->timestamps();
        });
        
        Schema::create('businessesDocuments', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedBigInteger('businessDocumentDetail_id');
            $table->unsignedSmallInteger('businessDocumentType_id');
            $table->unsignedInteger('number')->default();
            $table->decimal('amount',20,6);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('businessDocumentDetail_id')->references('id')->on('businessesDocumentsDetails');
            $table->foreign('businessDocumentType_id')->references('id')->on('businessesDocumentsTypes');
        });

        Schema::create('businessesDocumentsConfig', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('establishment_id');
            $table->unsignedSmallInteger('pos');
            $table->unsignedInteger('number');
            $table->string('description')->nullable()->default(null);
            $table->date('fiscalOpening');
            $table->date('fiscalClosing');
            $table->string('cai',14)->nullable()->default(null);
            $table->dateTime('caiExpirationDate');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('establishments');
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