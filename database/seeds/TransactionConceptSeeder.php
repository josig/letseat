<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TransactionConceptSeeder extends Seeder
{
    

    public function run()
    {
        $now = Carbon::now();

        DB::table('transactionsConcepts')->insert([
            'name' => 'Carga de crédito',
            'description' => null,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('transactionsConcepts')->insert([
            'name' => 'Pago',
            'description' => null,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('transactionsConcepts')->insert([
            'name' => 'Devolución',
            'description' => null,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
