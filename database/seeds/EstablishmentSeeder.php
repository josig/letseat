<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Establishment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Establishment::create([
            'name' => 'Colegio San Bartolomé',
            'description' => 'El colegio San Bartolomé cuenta con dos sucursales',
            'status' => 1
        ]);

        DB::table('branches')->insert([
            'name' => 'Centro',
            'description' => 'Sede Centro',
            'phone' => '341240000',
            'mobile' => '3416000000',
            'streetName' => 'Tucumán',
            'buildingNumber' => '',
            'floorNumber' => null,
            'location' => 'Rosario',
            'state' => 'Santa Fe',
            'zipCode' => '2000',
            'country' => 'Argentina',
            'status' => 1
        ],
        [
            'name' => 'Fisherton',
            'description' => 'Sede Fisherton',
            'phone' => '341240000',
            'mobile' => '3416000000',
            'streetName' => 'Wilde',
            'buildingNumber' => '',
            'floorNumber' => null,
            'location' => 'Rosario',
            'state' => 'Santa Fe',
            'zipCode' => '2000',
            'country' => 'Argentina',
            'status' => 1
        ]);

        $now = Carbon::now();
        DB::table('establishments_users')->insert([
            'establishment_id' => 1,
            'user_id' => 1,
            'degree' => null,
            'section' => null,
            'shift' => null,
            'year' => 2022,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'establishment_id' => 1,
            'user_id' => 2,
            'degree' => null,
            'section' => null,
            'shift' => null,
            'year' => 2022,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'establishment_id' => 1,
            'user_id' => 3,
            'degree' => null,
            'section' => null,
            'shift' => null,
            'year' => 2022,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            'establishment_id' => 1,
            'user_id' => 4,
            'degree' => 'Sala de 3 años',
            'section' => 'B',
            'shift' => 'Doble escolaridad',
            'year' => 2022,
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        /*DB::table('establishments')->insert([
            'name' => Str::random(10),
            'description' => Str::random(50)
        ]);*/
    }
}
