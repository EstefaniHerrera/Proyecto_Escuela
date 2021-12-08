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
        $this->call([
            
            GradoSeeder::class,   
            ProfesorSeeder::class,
            AlumnoSeeder::class
        ]);
        
        \App\Models\GradoProfesor::factory(24)->create();
    }
}
