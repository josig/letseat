<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedSmallInteger('establishment_id');
            $table->string('name');
            $table->string('description')->nullable(null);
            $table->string('phone')->nullable(null);
            $table->string('mobile')->nullable(null);
            $table->string('streetName')->nullable(null);
            $table->string('buildingNumber')->nullable(null);
            $table->string('floorNumber')->nullable(null);
            $table->string('location')->nullable(null);
            $table->string('state')->nullable(null);
            $table->string('zipCode')->nullable(null);
            $table->string('country')->nullable(null);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('establishments')->onUpdate('cascade')->onDelete('cascade');
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
    }
}
