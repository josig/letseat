<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_establishment');
            $table->enum('degree',['Sala de 3 años', 'Sala de 4 años', 'Preescolar', '1er grado', '2do grado', '3er grado', '4to grado', '5to grado', '6to grado', '7mo grado', '1er año', '2do año', '3er año', '4to año', '5to año'])->nullable()->default(null);
            $table->enum('section',['A', 'B', 'C', 'D'])->nullable()->default(null);
            $table->enum('shift',['Doble escolaridad', 'Mañana', 'Tarde', 'Noche'])->nullable()->default(null);
            $table->year('year')->nullable()->default(null);
            $table->enum('status',['0', '1', '2'])->default(1);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('id_establishment')->references('id')->on('establishments')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_establishments');
    }
}
