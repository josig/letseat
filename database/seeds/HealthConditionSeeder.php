<?php

use App\HealthCondition;
use Illuminate\Database\Seeder;

class HealthConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HealthCondition::create([
            'name' => 'Diabetes']);
        HealthCondition::create([
            'name' => 'Celiaquía']);
        HealthCondition::create([
            'name' => 'Hipertensión']);
        HealthCondition::create([
            'name' => 'Obesidad']);
        HealthCondition::create([
            'name' => '(APLV) Alergia a la proteína de la vaca']);
        HealthCondition::create([
            'name' => 'Intolerancia a la lactosa']);
        HealthCondition::create([
            'name' => 'Alergia al huevo']);
        HealthCondition::create([
            'name' => 'Alergia al pescado o marsicos']);
        HealthCondition::create([
            'name' => 'Alergia a los frutos secos']);
    }
}
