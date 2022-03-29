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
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_paymentMethod');
            $table->unsignedBigInteger('id_transactionConcept');
            $table->unsignedBigInteger('id_businessDocument');
            $table->unsignedBigInteger('id_currency');
            $table->float('amount', 8, 2);
            $table->string('reference',9)->nullable()->default(null);
            $table->enum('status', ['0', '1', '2'])->default(1);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_paymentMethod')->references('id')->on('paymentsMethods');
            $table->foreign('id_transactionConcept')->references('id')->on('transactionsConcepts');
            $table->foreign('id_businessDocument')->references('id')->on('businessesDocuments');
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
    }
}
