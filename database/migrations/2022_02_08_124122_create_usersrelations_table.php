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
            $table->unsignedSmallInteger('establishment_id');
            $table->unsignedInteger('parent_id');
            $table->unsignedInteger('child_id');
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->foreign('parent_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
