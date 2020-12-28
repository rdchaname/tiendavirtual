<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_registro');
            $table->decimal('total', 10, 2);
            $table->string('origen',50);
            $table->string('destino',50);
            $table->string('condicion', 20);
            $table->text('observacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('tipo_pago_id')->constrained();
            $table->foreignId('moneda_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
