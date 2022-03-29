<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersRelations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_parent');
            $table->unsignedBigInteger('id_child');
            $table->timestamps();

            $table->foreign('id_parent')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_child')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersRelations');
    }
}
