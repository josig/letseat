<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Establishment;

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
            'description' => 'El colegio San Bartolomé cuenta con dos sucursales'
        ]);


        /*DB::table('establishments')->insert([
            'name' => Str::random(10),
            'description' => Str::random(50)
        ]);*/
    }
}
