<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;


class AlumnoFactory extends Factory
{
    protected $model= Alumno::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grado_id'=>$this->faker->numberBetween(1, 24),
            'Nombres'=>$this->faker->firstName(),
            'PrimerApellido'=>$this->faker->lastName(),
            'SegundoApellido'=>$this->faker->lastName(),
            'AñoIngreso'=>$this->faker->year(),
            'CorreoElectronico'=>$this->faker->unique()->Email(),
            'Edad'=>$this->faker->numberBetween(6, 15),
            'FechaNacimiento'=>$this->faker->dateTimeBetween('-15 years', '-6 years')
        ];
    }
}
 
