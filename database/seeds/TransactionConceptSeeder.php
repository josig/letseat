<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactionsConcepts')->insert([
            'name' => 'Carga de crédito',
            'description' => null
        ]);
        DB::table('transactionsConcepts')->insert([
            'name' => 'Pago',
            'description' => null
        ]);
        DB::table('transactionsConcepts')->insert([
            'name' => 'Devolución',
            'description' => null
        ]);
    }
}
