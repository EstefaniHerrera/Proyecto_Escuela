<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradoProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'grado_id'=>$this->faker->numberBetween(1, 24),
            'profesor_id'=>$this->faker->numberBetween(1, 15)
        ];
    }
}
