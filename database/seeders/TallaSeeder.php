<?php

namespace Database\Seeders;

use App\Models\Talla;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($archivo = fopen(storage_path('app/db/tallas.csv'), "r")) !== FALSE) {
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                $existe = Talla::firstWhere('medida', $datos[0]);
                if (is_null($existe)) {
                    $talla = new Talla();
                    $talla->medida = $datos[0];
                    $talla->save();
                }
            }
            fclose($archivo);
        }
    }
}
