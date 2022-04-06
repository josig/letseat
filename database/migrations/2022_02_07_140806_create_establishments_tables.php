<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishmentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('description')->nullable(null);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('establishment_id');
            $table->string('name');
            $table->string('description')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->string('streetName')->nullable()->default(null);
            $table->string('buildingNumber')->nullable()->default(null);
            $table->string('floorNumber')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('zipCode')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
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
        Schema::dropIfExists('branches');
        Schema::dropIfExists('establishments');
    }
}
