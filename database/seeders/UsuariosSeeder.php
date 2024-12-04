<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('usuariosadmin')->insert(['usuario' => 'memo.gomez','contrasena' => Hash::make('12345678'),'activo'=> 1]);
        DB::table('usuariosadmin')->insert(['usuario' => 'admin','contrasena' => Hash::make('4dm1n2023'),'activo'=> 1,'id_rol' => '1']);
        DB::table('usuariosadmin')->insert(['usuario' => 'admin1','contrasena' => Hash::make('4dm1n12023'),'activo'=> 1,'id_rol' => '1']);
        DB::table('usuariosadmin')->insert(['usuario' => 'admin2','contrasena' => Hash::make('4dm1n22023'),'activo'=> 1,'id_rol' => '1']);
        DB::table('usuariosadmin')->insert(['usuario' => 'recepcion','contrasena' => Hash::make('r3c3p2023'),'activo'=> 1,'id_rol' => '2']);  
        DB::table('usuariosadmin')->insert(['usuario' => 'recepcion1','contrasena' => Hash::make('r3c3p12023'),'activo'=> 1,'id_rol' => '2']);
        
    }
}
