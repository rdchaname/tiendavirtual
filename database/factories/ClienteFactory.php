<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apellido_paterno' => $this->faker->lastName,
            'apellido_materno' => $this->faker->lastName,
            'nombres' => $this->faker->firstName,
            'documento' => $this->faker->randomNumber(8, true),
            'direccion' => $this->faker->address,
            'email' => $this->faker->safeEmail,
            'celular' => $this->faker->phoneNumber
        ];
    }


    /**
     * Asignar documento con 8 digitos
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function clienteDni()
    {
        return $this->state(function (array $attributes) {
            return [
                'documento' => $this->faker->randomNumber(8, true),
                'tipo_documento_id' => 1
            ];
        });
    }

    /**
     * Asignar documento con 8 digitos
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function clienteRuc()
    {
        return $this->state(function (array $attributes) {
            return [
                'documento' => $this->faker->randomNumber(11, true),
                'tipo_documento_id' => 2
            ];
        });
    }
}
