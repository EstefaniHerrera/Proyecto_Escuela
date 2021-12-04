<?php

namespace Database\Factories;

use App\Models\Grado;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradoFactory extends Factory
{
    protected $model= Grado::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NivelGrado'=>$this->faker->randomElement($array = array ('Primero','Segundo','Tercero','Cuarto', 'Quinto', 'Sexto')),
            'Seccion'=>$this->faker->randomElement($array = array ('1','2','3','4'))
        ];
    }
}
