<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioServicios', function (Blueprint $table) {
            $table->increments('idUsuarioServicios');
             $table->integer('idUser')->unsigned();
             $table->integer('idServicio')->unsigned();
             
             $table->float('costoTotal');
             $table->string('estadoSolicitud');
            
             $table->foreign('idUser')->references('id')->on('users')
                     ->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('idServicio')->references('idServicio')->on('servicios')
                          ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('usuarioServicios');

    }
}
