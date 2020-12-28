<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($archivo = fopen(storage_path('app/db/categorias.csv'), "r")) !== FALSE) {
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                $categorias = explode("-", $datos[0]);
                $cantidad = count($categorias);
                $contador = 0;
                $categoria_id = null;
                while ($contador < $cantidad) {
                    $nombreCategoria = $categorias[$contador];
                    $existe = Categoria::where('nombre', $nombreCategoria)->where(function ($query) use ($categoria_id) {
                        if (!is_null($categoria_id)) {
                            $query->where('categoria_id', $categoria_id);
                        } else {
                            $query->whereNull('categoria_id');
                        }
                    })->first();
                    if (!is_null($existe)) {
                        $categoria_id = $existe->id;
                    }else{
                        $categoria = new Categoria();
                        $categoria->nombre = $nombreCategoria;
                        $categoria->categoria_id = $categoria_id;
                        $categoria->save();
                        $categoria_id = $categoria->id;
                    }
                    $contador++;
                }
            }
            fclose($archivo);
        }
    }
}
