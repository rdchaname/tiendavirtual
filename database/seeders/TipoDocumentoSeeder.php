<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_documentos = [
            ['Documento Nacional de Identidad', 'DNI'],
            ['Registro Único del Contribuyente', 'RUC'],
            ['Carnet de Extranjeria', null]
        ];
        foreach ($tipo_documentos as $tipo_documento) {
            $existe = TipoDocumento::firstWhere('nombre', $tipo_documento[0]);
            if (is_null($existe)) {
                TipoDocumento::create([
                    'nombre' => $tipo_documento[0],
                    'nombre_corto' => $tipo_documento[1],
                ]);
            }
        }
    }
}
