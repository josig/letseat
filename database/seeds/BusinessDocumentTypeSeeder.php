<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BusinessDocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('businessesDocumentsTypes')->insert([
            'name' => 'Comprobante de pago',
            'description' => 'test',
            'observations' => null,
            'legal' => 0,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        DB::table('businessesDocumentsTypes')->insert([
            'name' => 'Factura',
            'description' => 'test',
            'observations' => null,
            'legal' => 0,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now
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
