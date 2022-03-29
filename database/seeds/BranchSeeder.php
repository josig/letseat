<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
