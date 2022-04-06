<?php

use App\HealthCondition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class HealthConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        HealthCondition::create([
            'name' => 'Diabetes',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Celiaquía',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Hipertensión',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Obesidad',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => '(APLV) Alergia a la proteína de la vaca',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Intolerancia a la lactosa',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Alergia al huevo',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Alergia al pescado o marsicos',
            'created_at' => $now,
            'updated_at' => $now
        ]);
        HealthCondition::create([
            'name' => 'Alergia a los frutos secos',
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
