<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName')->default('')->required();
            $table->string('middleName')->nullable()->default(null);
            $table->string('lastName')->nullable()->default(null)->required();
            $table->string('fullName')->nullable()->default(null);
            $table->string('nickName')->nullable()->default(null);
            $table->enum('gender', ['female', 'male'])->required();
            $table->date('birthday')->nullable()->default(null)->required();
            $table->enum('governmentIdType', ['DNI', 'LC', 'LE', 'CI'])->required();
            $table->char('governmentId', 8)->default('')->unique()->required();
            $table->string('mobile')->nullable()->default(null);
            $table->string('username')->unique();
            $table->string('email')->required();
            $table->string('password')->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['0', '1', '2'])->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
