<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($archivo = fopen(storage_path('app/db/marcas.csv'), "r")) !== FALSE) {
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                $existe = Marca::firstWhere('nombre', $datos[0]);
                if (is_null($existe)) {
                    $marca = new Marca();
                    $marca->nombre = $datos[0];
                    $marca->save();
                }
            }
            fclose($archivo);
        }
    }
}
