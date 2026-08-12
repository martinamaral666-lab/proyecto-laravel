<?php

namespace Database\Seeders;

use App\Models\Editorial;
use App\Models\Generos;
use App\Models\Libros;
use App\Models\Pedidos;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run(): void
    {
      $generos = Generos::factory(5)->create();

        Editorial::factory(4)->create()->each(function ($editorial) use ($generos) {

            $libros = Libros::factory(3)->create([
                'editorial_id' => $editorial->id,
                'genero_id' => fn() => $generos->random()->id,
            ]);

            $pedidos = Pedidos::factory(2)->create([
                'editorial_id' => $editorial->id,
            ]);

            foreach ($pedidos as $pedido) {
                $pedido->libros()->attach($libros->random(rand(1, 2)));
            }
        });
    }
}
