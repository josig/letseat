<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now
        
        ]);
    }
}
