<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            /*'id_userType' => 1,
            'firstName' => Str::random(10),
            'middleName' => Str::random(10),
            'lastName' => Str::random(10),
            'fullName' => Str::random(30),
            'nickName' => Str::random(5),
            'gender' => 'Male',
            'birthday' => '1980-10-31',
            'governmentIdType' => 'DNI',
            'governmentId' => Str::random(8),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'api_token' => '',
            'status' => 1*/
        ]);
    }
}
