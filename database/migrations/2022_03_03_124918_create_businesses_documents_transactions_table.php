<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesDocumentsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessesDocuments_transactions', function (Blueprint $table) {
            //$table->unsignedSmallInteger('establishment_id');
            $table->unsignedSmallInteger('businessDocument_id');
            $table->unsignedBigInteger('transaction_id');
            $table->timestamps();

            //$table->foreign('businessDocument_id')->references('id')->on('businessesDocuments');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessesDocuments_transactions');
    }
}
