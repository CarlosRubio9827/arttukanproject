<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleIngresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleIngresos', function (Blueprint $table) {
            $table->increments('idDetalleIngreso');
            $table->unsignedInteger('idProducto');
            $table->unsignedInteger('idIngreso');
            $table->integer('cantidad');
            $table->foreign('idProducto')->references('idProducto')->on('productos');
            $table->foreign('idIngreso')->references('idIngreso')->on('ingresos');
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
        Schema::drop('detalleIngresos');
    }
}
