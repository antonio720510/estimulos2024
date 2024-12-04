<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TallasSacoCaballeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tallassacocaballero')->insert(['talla' => '34C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '34R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '34L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '36C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '36R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '36L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '38C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '38R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '38L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '40C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '40R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '40L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '42C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '42R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '42L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '44C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '44R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '44L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '46C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '46R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '46L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '48C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '48R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '48L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '50C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '50R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '50L','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '52C','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '52R','activo'=> 1]);
        DB::table('tallassacocaballero')->insert(['talla' => '52L','activo'=> 1]);        

    }
}
