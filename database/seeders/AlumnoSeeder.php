<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumno::factory(500)->create();
    }
}
