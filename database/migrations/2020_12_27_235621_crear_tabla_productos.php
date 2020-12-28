<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('codigo', 50)->nullable();
            $table->decimal('precio', 10, 2);
            $table->decimal('descuento', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('genero_id')->nullable()->constrained();
            $table->foreignId('categoria_id')->constrained();
            $table->foreignId('marca_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
