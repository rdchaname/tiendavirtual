<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(TallaSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(UsuarioSeeder::class);
    }
}
