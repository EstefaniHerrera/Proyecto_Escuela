<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model= Profesor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombres'=>$this->faker->firstName(),
            'PrimerApellido'=>$this->faker->lastName(),
            'SegundoApellido'=>$this->faker->lastName(),
            'Telefono'=>$this->faker->phoneNumber(),
            'CorreoElectronico'=>$this->faker->unique()->Email(),
            'Sueldo'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 8000.00, $max = 25000.99)
        ];
    }
}