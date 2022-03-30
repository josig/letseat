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
            $table->increments('id');
            $table->string('firstName')->required();
            $table->string('middleName')->nullable()->default(null);
            $table->string('lastName')->required()->nullable()->default(null);
            $table->string('fullName')->nullable()->default(null);
            $table->string('nickName')->nullable()->default(null);
            $table->enum('gender', ['male', 'female'])->required();
            $table->date('birthday')->nullable()->default(null)->required();
            $table->enum('governmentIdType', ['DNI', 'LC', 'LE', 'CI', 'Pasaporte'])->required();
            $table->char('governmentId', 8)->required()->unique()->default('');
            $table->string('mobile')->nullable()->default(null);
            $table->char('username',20)->required()->unique();
            $table->string('email')->required();
            $table->string('password')->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(0);
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
