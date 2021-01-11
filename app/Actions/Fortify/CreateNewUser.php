<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'apellido_paterno' => ['required', 'string', 'max:50'],
            'apellido_materno' => ['required', 'string', 'max:50'],
            'nombres' => ['required', 'string', 'max:50'],
            'tipo_documento_id' => ['required', 'integer'],
            'documento' => ['required', 'string', 'max:11'],
            'celular' => ['required', 'string'],
            'direccion' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                Rule::unique(Cliente::class)
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        // agregar el registro en clientes
        $cliente = new Cliente();
        $cliente->apellido_paterno = $input['apellido_paterno'];
        $cliente->apellido_materno = $input['apellido_materno'];
        $cliente->nombres = $input['nombres'];
        $cliente->tipo_documento_id = $input['tipo_documento_id'];
        $cliente->documento = $input['documento'];
        $cliente->direccion = $input['direccion'];
        $cliente->celular = $input['celular'];
        $cliente->email = $input['email'];
        $cliente->save(); // es el encargado de guardar en la base de datos
        // tambien devuelve el ID con el que se registro en la BD $cliente->id

        $nombre_completo = $input['nombres'] . " " . $input['apellido_paterno']. " ". $input['apellido_materno'];

        return User::create([
            'name' => $nombre_completo,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'cliente_id' => $cliente->id
        ]);
    }
}
