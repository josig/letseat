<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstablishmentSeeder::class);
        $this->call(BusinessDocumentTypeSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(TransactionConceptSeeder::class);
        $this->call(HealthConditionSeeder::class);
    }
}
