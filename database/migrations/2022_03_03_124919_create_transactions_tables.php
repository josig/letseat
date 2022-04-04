<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('establishment_id');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('paymentMethod_id');
            $table->unsignedSmallInteger('transactionConcept_id');
            $table->unsignedSmallInteger('businessDocument_id');
            $table->unsignedSmallInteger('currency_id');
            $table->float('amount', 8, 2);
            $table->string('reference',9)->nullable()->default(null);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('paymentMethod_id')->references('id')->on('paymentsMethods');
            $table->foreign('transactionConcept_id')->references('id')->on('transactionsConcepts');
            $table->foreign('businessDocument_id')->references('id')->on('businessesDocuments');
        });

        Schema::create('transactionsConcepts', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('transactionsConcepts');
    }
}
