<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPresentaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('stock');
            $table->integer('stock_pedido');
            $table->string('codigo', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('producto_id')->constrained();
            $table->foreignId('talla_id')->constrained();
            $table->foreignId('color_id')->constrained('colores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentaciones');
    }
}
