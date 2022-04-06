<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        
        DB::table('paymentsMethods')->insert([
            'name' => 'Efectivo',
            'description' => 'Efectivo',
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('paymentsMethods')->insert([
            'name' => 'Tarjeta de débito',
            'description' => 'Débito',
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('paymentsMethods')->insert([
            'name' => 'Tarjeta de crédito',
            'description' => 'Crédito',
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
