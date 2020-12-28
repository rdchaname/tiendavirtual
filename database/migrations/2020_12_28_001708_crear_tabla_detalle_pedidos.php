<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDetallePedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 10, 2);
            $table->unsignedInteger('cantidad');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('pedido_id')->constrained();
            $table->foreignId('presentacion_id')->constrained('presentaciones');
            $table->foreignId('envio_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
