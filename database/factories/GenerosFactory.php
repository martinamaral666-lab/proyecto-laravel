<?php

namespace Database\Factories;

use App\Models\Generos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Generos>
 */
class GenerosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nombre' => $this->faker->unique()->word(),
           'descripcion' => $this->faker->sentence(),
        ];
    }
}
