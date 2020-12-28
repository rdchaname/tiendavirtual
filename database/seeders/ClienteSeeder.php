<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory()->hasUsers(1, function (array $attributes, Cliente $cliente) {
            return [
                'name' => $cliente->nombres . ' ' . $cliente->apellido_paterno . ' ' . $cliente->apellido_materno,
                'email' => $cliente->email
            ];
        })->count(50)->clienteDni()->create();
    }
}
