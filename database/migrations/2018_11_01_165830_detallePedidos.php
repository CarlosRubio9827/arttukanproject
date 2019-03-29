<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetallePedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePedidos', function (Blueprint $table) {
            $table->increments('idDetallePedido');
            $table->unsignedInteger('idPedido');
            $table->unsignedInteger('idProducto');
            $table->integer('cantidad');
            $table->decimal('precioPedido',11,2);
            $table->foreign('idPedido')->references('idPedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');
            $table->timestamps();
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
