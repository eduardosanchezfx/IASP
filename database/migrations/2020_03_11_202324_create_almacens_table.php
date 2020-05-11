<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacens', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id');
            $table->string('numero_almacen');
            $table->string('nombre');
            $table->string('estado');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('codigo_postal');
            $table->string('pais');
            $table->enum('tipo',['S','T','A']);//[S]Almacen, [T]Tienda, [A]Aeropuerto
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('encargado_id')->unsigned();
            $table->foreign('encargado_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacens');
    }
}
