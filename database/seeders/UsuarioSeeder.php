<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(['email' => 'admin@tiendavirtual.com', 'name' => 'Administrador del Sistema'])->create();
    }
}
