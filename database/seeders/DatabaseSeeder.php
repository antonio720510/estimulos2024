<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsuariosSeeder::class);

        $this->call(TallasSacoCaballeroSeeder::class);
        $this->call(TallasPantalonCaballeroSeeder::class);       
        $this->call(TallasCamisaCaballeroSeeder::class);
        
        $this->call(TallasSacoDamaSeeder::class);
        $this->call(TallasPantalonDamaSeeder::class);       
        $this->call(TallasBlusaDamaSeeder::class);
        $this->call(TallasChalecoDamaSeeder::class);
        $this->call(EmpleadosSeeder::class);
        
    }
}
