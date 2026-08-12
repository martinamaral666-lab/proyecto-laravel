<?php

namespace Database\Factories;

use App\Models\Pedidos;
use App\Models\Editorial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pedidos>
 */
class PedidosFactory extends Factory
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
            'fecha' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['activo', 'cancelado', 'enviado']),
        ];
    }
}
