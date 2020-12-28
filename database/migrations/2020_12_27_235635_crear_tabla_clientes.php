<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('nombres', 50);
            $table->string('documento', 11)->unique();
            $table->string('direccion', 100);
            $table->string('email', 120)->unique();
            $table->string('celular', 20);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('tipo_documento_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
