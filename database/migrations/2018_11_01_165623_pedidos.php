<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('idPedido');
            $table->datetime('fechaHora');
            $table->decimal('totalPedido', 11, 2);
            $table->unsignedInteger('idCliente');            
            $table->char('estado', 4);
            $table->unsignedInteger('idPag');
            $table->foreign('idPag')->references('idPago')->on('pagos')->onDelete('cascade');
            $table->foreign('idCliente')->references('id')->on('users');
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
        Schema::drop('ventas');
    }
}
