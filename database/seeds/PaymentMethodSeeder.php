<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentsMethods')->insert([
            'name' => 'Efectivo',
            'description' => 'Efectivo'
        ]);
        DB::table('paymentsMethods')->insert([
            'name' => 'Tarjeta de débito',
            'description' => 'Débito'
        ]);
        DB::table('paymentsMethods')->insert([
            'name' => 'Tarjeta de crédito',
            'description' => 'Crédito'
        ]);
    }
}
