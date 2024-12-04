<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TallasChalecoDamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('tallaschalecodama')->insert(['talla' => '22R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '24R','activo'=> 1]);
        DB::table('tallaschalecodama')->insert(['talla' => '24L','activo'=> 1]);               
        DB::table('tallaschalecodama')->insert(['talla' => '26R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '28R','activo'=> 1]);       
        DB::table('tallaschalecodama')->insert(['talla' => '30R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '32R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '34R','activo'=> 1]);       
        DB::table('tallaschalecodama')->insert(['talla' => '36R','activo'=> 1]);      
        DB::table('tallaschalecodama')->insert(['talla' => '38R','activo'=> 1]);       
        DB::table('tallaschalecodama')->insert(['talla' => '40R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '42R','activo'=> 1]);       
        DB::table('tallaschalecodama')->insert(['talla' => '44R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '46R','activo'=> 1]);        
        DB::table('tallaschalecodama')->insert(['talla' => '48R','activo'=> 1]);       
    }
}
