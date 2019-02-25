<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoProductos', function (Blueprint $table) {
            $table->increments('idTipoProducto');
            $table->string('nombreTipoProducto');
            $table->string('descripcionTipoProducto');
            $table->boolean('condicion');
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
        Schema::drop('tipoProductos');
    }
}
