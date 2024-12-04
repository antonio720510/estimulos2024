<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TallasPantalonCaballeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tallaspantaloncaballero')->insert(['talla' => '28C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '28R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '28L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '30C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '30R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '30L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '32C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '32R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '32L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '34C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '34R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '34L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '36C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '36R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '36L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '38C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '38R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '38L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '40C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '40R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '40L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '42C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '42R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '42L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '44C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '44R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '44L','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '46C','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '46R','activo'=> 1]);
        DB::table('tallaspantaloncaballero')->insert(['talla' => '46L','activo'=> 1]); 
    }
}
