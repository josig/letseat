<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessDocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businessesDocumentsTypes')->insert([
            'name' => 'Comprobante de pago',
            'description' => 'test'
        ]);
        DB::table('businessesDocumentsTypes')->insert([
            'name' => 'Factura',
            'description' => 'test'
        ]);
        /*BusinessDocument::create([
            'name' => 'Comprobante de pago',
            'description' => 'Para pagos realizados en efectivo'
        ]);
        BusinessDocument::create([
            'name' => 'Factura',
            'description' => 'Para pagos bancarizados'
        ]);*/
    }
}
