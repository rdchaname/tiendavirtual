<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($archivo = fopen(storage_path('app/db/colores.csv'), "r")) !== FALSE) {
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                $existe = Color::firstWhere('nombre', $datos[0]);
                if (is_null($existe)) {
                    $color = new Color();
                    $color->nombre = $datos[0];
                    $color->save();
                }
            }
            fclose($archivo);
        }
    }
}
