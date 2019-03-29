<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->string('codigoProducto');
            $table->string('nombreProducto');
            $table->string('descripcion');
            $table->string('imagen');
            $table->integer('stock');
            $table->decimal('precio',11,2);
            $table->char('estado',2);
            $table->unsignedInteger('idTipoProducto');
            $table->foreign('idTipoProducto')->references('idTipoProducto')->on('tipoProductos');
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
         Schema::drop('productos');
    }
}
