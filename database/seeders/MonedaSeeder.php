<?php

namespace Database\Seeders;

use App\Models\Moneda;
use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = [['Soles', 'S/', 1.00], ['Dolares', '$', 3.7]];
        foreach ($monedas as $moneda) {
            $existe = Moneda::firstWhere('nombre', $moneda[0]);
            if (is_null($existe)) {
                Moneda::create([
                    'nombre' => $moneda[0],
                    'simbolo' => $moneda[1],
                    'tipo_cambio' => $moneda[2]
                ]);
            }
        }
    }
}
