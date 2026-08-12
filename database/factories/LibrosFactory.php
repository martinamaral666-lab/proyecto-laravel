<?php

namespace Database\Factories;

use App\Models\Libros;
use App\Models\Editorial;
use App\Models\Generos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libros>
 */
class LibrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'editorial_id' => Editorial::factory(),
            'titulo' => $this->faker->sentence(3),
            'genero_id' => Generos::factory(),
            'autor' => $this->faker->name(),
        ];
    }
}
