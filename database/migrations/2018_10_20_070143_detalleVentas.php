<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleVentas', function (Blueprint $table) {
            $table->increments('idDetalleVenta');
            $table->unsignedInteger('idVenta');
            $table->unsignedInteger('idProducto');
            $table->integer('cantidad');
            $table->decimal('precioVenta',11,2);
            $table->foreign('idVenta')->references('idVenta')->on('ventas');
            $table->foreign('idProducto')->references('idProducto')->on('productos');
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
