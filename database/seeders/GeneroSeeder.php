<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = ['Hombre', 'Mujer', 'Niño', 'Niña'];
        foreach ($generos as $genero) {
            $existe = Genero::firstWhere('nombre', $genero);
            if (is_null($existe)) {
                Genero::create([
                    'nombre' => $genero
                ]);
            }
        }
    }
}
